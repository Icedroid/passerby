<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 19:04
 */

namespace api\modules\v1\models;

use Yii;

class Help extends \common\models\Help
{

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['updated_at']);

        $fields['end_date'] = function ($model){
            return date("Y-m-d", strtotime($model->end_date));
        };
        $fields['created_at'] = function ($model){
            return date("Y-m-d", $model->created_at);
        };
        $fields['nickname'] = function ($model) {
            return $model->user->nickname;
        };
        $fields['avatar'] = function ($model) {
            return $model->user->avatar;
        };
        return $fields;
    }

    public function beforeValidate()
    {
        if(!Yii::$app->getUser()->getIsGuest()){
            $this->uid = Yii::$app->getUser()->getIdentity()->getId();
        }
        return parent::beforeValidate();
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_DELETE,
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {//用户的咨询数加1
            $model = User::findOne(['id' => $this->uid]);
            if ($model !== null) {
                $model->updateCounters(['help_count' => 1]);
            }
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function afterDelete()
    {
        $model = User::findOne(['id' => $this->uid]);
        if ($model !== null) {//用户的咨询数减1
            $model->updateCounters(['help_count' => -1]);
        }
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }

}