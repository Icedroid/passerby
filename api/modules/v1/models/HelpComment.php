<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 19:04
 */

namespace api\modules\v1\models;

use Yii;

class HelpComment extends \common\models\HelpComment
{

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['updated_at']);

        $fields['created_at'] = function ($model) {
            return date("Y-m-d", $model->created_at);
        };
        $fields['nickname'] = function ($model) {
            return $model->user->nickname;
        };
        $fields['avatar'] = function ($model) {
            return $model->user->avatar;
        };
        $fields['job'] = function ($model) {
            return $model->user->job;
        };
        return $fields;
    }

    public function beforeValidate()
    {
        if (!Yii::$app->getUser()->getIsGuest()) {
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
        if ($insert) {//贴子的评论数加1
            $model = Help::findOne(['id' => $this->help_id]);
            if ($model !== null) {
                $model->updateCounters(['comment_count' => 1]);
            }
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function afterDelete()
    {
        $model = Help::findOne(['id' => $this->help_id]);
        if ($model !== null) {
            $model->updateCounters(['comment_count' => -1]);
        }
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }

}