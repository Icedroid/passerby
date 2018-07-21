<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */

namespace api\modules\v1\controllers;

use api\modules\v1\models\Charge;
use common\helpers\ResponseHelper;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\Controller;
use yii\web\Response;


class OrderController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;//默认浏览器打开返回json
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
//                HttpBasicAuth::className(),
                HttpBearerAuth::className(),
                QueryParamAuth::className(),
//                [
//                    'class' => QueryParamAuth::className(),
//                    'tokenParam'=>'access_token',//修改query的参数名
//                ],
            ],
            'only' => [
                'index',
            ],
        ];

        return $behaviors;
    }

    /**
     *
     * @SWG\Post(path="/charge",
     *     tags={"other"},
     *     summary="充值",
     *     description="返回JSSDK调起微信支付所需的信息",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Parameter(
     *        in = "body",
     *        name = "body",
     *        description = "充值金额",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/Charge"),
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success"
     *     )
     * )
     *
     */

    /**
     * 调起微信支付来充值
     *
     * @return Charge|array
     * @throws Yii\base\ErrorException
     * @throws \Throwable
     * @throws \yii\base\Exception
     * @throws \yii\web\HttpException
     */
    public function actionIndex()
    {
        //用户输入充值金额
        $money = Yii::$app->getRequest()->post('money', 0);//单位为元

        $loginUser = Yii::$app->getUser()->getIdentity();
        $uid = $loginUser->getId();
        $openId = $loginUser->getOpenId();
        $ip = Yii::$app->getRequest()->getUserIP();

        if(!$money){
            ResponseHelper::apiResult(Yii::t('app', 'money required'));
        }
        $money = intval($money * 100);
        // 支付参数
        $orderData = [
            'body' => '充值',
            'out_trade_no' => Yii::$app->security->generateRandomString(),
            'total_fee' => $money,
            'spbill_create_ip' => $ip, // 可选，如不传该参数，SDK 将会自动获取相应 IP 地址
//            'notify_url' => 'https://pay.weixin.qq.com/wxpay/pay.action', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI',
            'openid' => $openId,
        ];

        // 生成支付配置
        $payment = Yii::$app->wechat->payment;
        $result = $payment->order->unify($orderData);
        if ($result['return_code'] == 'SUCCESS') {
            $prepayId = $result['prepay_id'];
            $config = $payment->jssdk->sdkConfig($prepayId);

            //save to db
            $model = new Charge();
            $model->load($orderData, '');
            if(!$model->save() && $model->hasErrors()){
                return $model;
            }
        } else {
            return $result;
            ResponseHelper::apiResult('微信支付异常, 请稍后再试');
        }

        return $config;
//        [
//            'jssdk' => $payment->jssdk, // $app通过上面的获取实例来获取
//            'config' => $config
//        ];
    }

    /**
     * 微信支付 通知回调
     * @throws \yii\base\ExitException
     */
    public function actionNotify()
    {
        $payment = Yii::$app->wechat->payment;

        $response = $payment->handlePaidNotify(function($message, $fail){
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
            $order = Charge::findOne(['out_trade_no'=>$message['out_trade_no']]);

            if (null === $order || $order->transaction_id) { // 如果订单不存在 或者 订单已经支付过了
                return true; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }

            ///////////// <- 建议在这里调用微信的【订单查询】接口查一下该笔订单的情况，确认是已经支付 /////////////

            if ($message['return_code'] === 'SUCCESS') { // return_code 表示通信状态，不代表支付状态
                // 用户是否支付成功
                if ($message['result_code'] === 'SUCCESS') {
                    $order->transaction_id = $message['transaction_id'];
                    $order->paid_at = time(); // 更新支付时间为当前时间
                    $order->status = Charge::STATUS_PAY_SUCCESS;

                } elseif ($message['result_code'] === 'FAIL') { // 用户支付失败
                    $order->status = Charge::STATUS_PAY_FAIL;
                }

                if(!$order->save()){
                    return $fail('订单保存失败，请稍后再通知我');
                }
            } else {
                return $fail('通信失败，请稍后再通知我');
            }
            return true; // 返回处理完成
        });

        $response->send(); // return $response;
//        Yii::$app->end();
    }

}
