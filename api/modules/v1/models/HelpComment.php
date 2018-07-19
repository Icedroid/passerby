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

        $fields['created_at'] = function ($model){
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
        if(!Yii::$app->getUser()->getIsGuest()){
            $this->uid = Yii::$app->getUser()->getIdentity()->getId();
        }
        return parent::beforeValidate();
    }

}