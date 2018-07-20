<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 19:04
 */

namespace api\modules\v1\models;

use Yii;

class UserExperience extends \common\models\UserExperience
{

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['start_date'], $fields['end_date'], $fields['updated_at']);
        $fields['created_at'] = function ($model){
          return date("Y-m-d", $model->created_at);
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
                $model->updateCounters(['experience_count' => 1]);
            }
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function afterDelete()
    {
        $model = User::findOne(['id' => $this->uid]);
        if ($model !== null) {//用户的咨询数减1
            $model->updateCounters(['experience_count' => -1]);
        }
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }

}