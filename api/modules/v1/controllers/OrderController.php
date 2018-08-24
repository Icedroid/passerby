<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */

namespace api\modules\v1\controllers;

use api\modules\v1\models\Complain;
use common\helpers\StringHelper;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\Controller;
use yii\web\Response;
use yii\data\ActiveDataProvider;

use api\modules\v1\models\Charge;
use api\modules\v1\models\Consume;
use api\modules\v1\models\Gift;
use api\modules\v1\models\Withdrawal;

use common\helpers\ResponseHelper;


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
        $out_trade_no = StringHelper::getUniqid();

        if(!$money){
            ResponseHelper::apiResult(Yii::t('app', 'money required'));
        }
        $money = intval($money * 100);
        // 支付参数
        $orderData = [
            'body' => '充值',
            'out_trade_no' => $out_trade_no,
            'total_fee' => $money, //单位为分
            'spbill_create_ip' => $ip, // 可选，如不传该参数，SDK 将会自动获取相应 IP 地址
//            'notify_url' => 'https://pay.weixin.qq.com/wxpay/pay.action', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI',
            'openid' => $openId,
        ];

        // 生成支付配置
        $payment = Yii::$app->wechat->payment;
        $result = $payment->order->unify($orderData);
        Yii::info(['charge' => $result], 'wechat');
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
            ResponseHelper::apiResult('微信支付异常, 请稍后再试');
        }

        return $config;
//        [
//            'jssdk' => $payment->jssdk, // $app通过上面的获取实例来获取
//            'config' => $config
//        ];
    }

    /**
     *
     * @SWG\Post(path="/withdrawal",
     *     tags={"other"},
     *     summary="提现",
     *     description="返回成功或失败",
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
     *        description = "提现金额",
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
     * 使用微信支付的企业付款 提现到微信零钱
     */
    public function actionWithdrawal()
    {
        //用户输入充值金额
        $money = Yii::$app->getRequest()->post('money', 0);//单位为元

        $loginUser = Yii::$app->getUser()->getIdentity();
//        $uid = $loginUser->getId();
        $openId = $loginUser->getOpenId();
//        $ip = Yii::$app->getRequest()->getUserIP();
        $partner_trade_no = StringHelper::getUniqid();

        if(!$money){
            ResponseHelper::apiResult('提现金额不能为空');
        }
        $money = intval($money * 100);
        if($money > $loginUser->getBalance()){
            ResponseHelper::apiResult('余额不足');
        }

        $realMoney = $money * (1 - Yii::$app->params['withdrawalPercentage']);
        // 生成支付配置
        $payment = Yii::$app->wechat->payment;

        try {
            $data = [
                'partner_trade_no' => $partner_trade_no, // 商户订单号，需保持唯一性(只能是字母或者数字，不能包含有符号)
                'openid' => $openId,
                'check_name' => 'NO_CHECK',
//            'check_name' => 'FORCE_CHECK', // NO_CHECK：不校验真实姓名, FORCE_CHECK：强校验真实姓名
//            're_user_name' => '王小帅', // 如果 check_name 设置为FORCE_CHECK，则必填用户真实姓名
                'amount' => $realMoney, // 企业付款金额，单位为分
                'desc' => '提现', // 企业付款操作说明信息。必填
            ];
            $result = $payment->transfer->toBalance($data);
            Yii::info(['withdrawal' => $result], 'wechat');
            if ($result['return_code'] === 'SUCCESS') { // return_code 表示通信状态，不代表支付状态
                // 用户是否支付成功
                if ($result['result_code'] === 'SUCCESS') {
                    //save to db
                    $model = new Withdrawal();
                    $model->load($data, '');
                    $model->amount = $money; //显示的时未扣款前的值
                    if(!$model->save() && $model->hasErrors()){
                        return $model;
                    }
                    return [];
                } elseif ($result['result_code'] === 'FAIL') { // 用户支付失败
                    $i = 3;
                    while ($i){
                        $result = $payment->transfer->queryBalanceOrder($partner_trade_no);
                        if($result['return_code'] === 'SUCCESS' && $result['result_code'] === 'SUCCESS' &&
                            ($result['status'] === 'SUCCESS' || $result['status'] === 'PROCESSING') ){
                            $model = new Withdrawal();
                            $model->load($data, '');
                            $model->amount = $money; //显示的时未扣款前的值
                            if(!$model->save() && $model->hasErrors()){
                                return $model;
                            }
                            return [];
                        }
                        $i--;
                    }
                    ResponseHelper::apiResult('提现到微信零钱失败，请稍后再试');
                }
            } else {
                ResponseHelper::apiResult('通信失败，请稍后再试');
            }
        }catch (\Exception $e){
            return $e->getMessage();
            ResponseHelper::apiResult('提现到微信零钱异常, 请稍后再试');
        }
    }

    /**
     *
     * @SWG\Post(path="/send-gift",
     *     tags={"other"},
     *     summary="打赏",
     *     description="打赏礼物给用户",
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
     *        description = "打赏礼物",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/Gift"),
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success"
     *     )
     * )
     *
     */
    /**
     * 赠送礼物接口
     */
    public function actionSendGift()
    {
        $model = new Gift();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
            return [];
        } elseif (!$model->hasErrors()) {
            ResponseHelper::busy();
        }

        return $model;
    }

    /**
     *
     * @SWG\Get(path="/consumes",
     *     tags={"other"},
     *     summary="获取流水",
     *     description="获取所有的流水记录",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = "success",
     *         @SWG\Schema(ref="#/definitions/Consume"),
     *     )
     * )
     *
     */

    /**
     * 获取用户的所有消费流水
     */
    public function actionConsume()
    {
        $params = Yii::$app->getRequest()->getQueryParams();

        $query = Consume::find()->select([])->where(['uid' => Yii::$app->getUser()->getIdentity()->getId()]);

        $dataProvider = Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $query,
            'pagination' => [
                'params' => $params,
                'pageParam' => 'page',
                'pageSizeParam' => 'limit',
                'defaultPageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => ['id'=>SORT_DESC],
                'params' => $params,
            ],
        ]);

        return $dataProvider;
    }

    /**
     *
     * 投诉接口
     *
     * @SWG\Post(path="/complain",
     *     tags={"other"},
     *     summary="投诉",
     *     description="投诉用户",
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
     *        description = "投诉内容",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/Complain"),
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success"
     *     )
     * )
     *
     */
    public function actionComplain()
    {
        $model = new Complain();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
            return [];
        } elseif (!$model->hasErrors()) {
            ResponseHelper::busy();
        }

        return $model;
    }

}
