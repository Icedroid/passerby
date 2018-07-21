<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 19:04
 */

namespace api\modules\v1\models;

use Yii;

class Gift extends \common\models\Gift
{

    public function fields()
    {
        $fields = parent::fields();

        $fields['created_at'] = function ($model){
            return date("Y-m-d", $model->created_at);
        };
//        $fields['nickname'] = function ($model) {
//            return $model->user->nickname;
//        };
//        $fields['avatar'] = function ($model) {
//            return $model->user->avatar;
//        };
        return $fields;
    }

    public function beforeValidate()
    {
        if(!Yii::$app->getUser()->getIsGuest()){
            $this->send_uid = Yii::$app->getUser()->getIdentity()->getId();
            $this->price = intval($this->price * 100); //客户端传上来的单位是元，转成分

            $needMoney = $this->price * $this->amount;
            if($needMoney > Yii::$app->getUser()->getIdentity()->getBalance()){
                $this->addError('price', '余额不足，请先充值');
                return false;
            }
        }
        return parent::beforeValidate();
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT,
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {//赠送礼物后添加两条流水，并给用户加钱和减钱
            $money = $this->price * $this->amount;

            $model = User::findOne(['id' => $this->accept_uid]);
            if ($model !== null) {
                $model->updateCounters(['balance' => $money, 'income' => $money]);
            }

            $model = User::findOne(['id' => $this->send_uid]);
            if ($model !== null) {
                $model->updateCounters(['balance' => -$money, 'consume' => $money]);
            }

            //流水表添加记录
            Consume::addRow($this->accept_uid, $money, Consume::TYPE_ACCEPT_GIFT);
            Consume::addRow($this->send_uid, $money, Consume::TYPE_SEND_GIFT);
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

}