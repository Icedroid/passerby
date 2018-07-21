<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use api\modules\v1\models\Charge;


class NotifyController extends Controller
{
    /**
     * 微信支付 通知回调
     * @throws \yii\base\ExitException
     */
    public function actionIndex()
    {
        $payment = Yii::$app->wechat->payment;

        $response = $payment->handlePaidNotify(function($message, $fail){
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
            $order = Charge::findOne(['out_trade_no'=>$message['out_trade_no']]);

            if (null === $order || $order->transaction_id) { // 如果订单不存在 或者 订单已经支付过了
                return true; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }

            ///////////// <- 建议在这里调用微信的【订单查询】接口查一下该笔订单的情况，确认是已经支付 /////////////
            Yii::info(['notify' => $message], 'wechat');

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
