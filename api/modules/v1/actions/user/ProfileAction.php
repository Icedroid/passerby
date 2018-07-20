<?php

namespace api\modules\v1\actions\user;

use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\Action;
use api\modules\v1\models\UserCollect;
use api\modules\v1\models\Help;

class ProfileAction extends Action
{
//    public $modelClass = 'common\models\User';
    /**
     * Displays a model.
     * @param string $id the primary key of the model.
     * @return \yii\db\ActiveRecordInterface the model being displayed
     */
    public function run()
    {
        if(Yii::$app->getUser()->getIsGuest()){
            return [];
        }

        $model = $this->findModel(Yii::$app->getUser()->getIdentity()->getId());
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }
//        return $model->view_count;

        $fields = $model->fields();
        $fields['view_count'] = 'view_count'; //访客次数
        $fields['collect_count'] = function ($model){//被收藏数
            return intval(UserCollect::find()->where(['uid'=>$model->id])->count('id'));
        };
        $fields['help_count'] = 'help_count'; //咨询次数

//        $fields['help_count'] = function ($model){//咨询次数
//            return intval(Help::find()->where(['uid'=>$model->id])->count('id'));
//        };
        $fields['star'] = function ($model) {//好评值
            return intval($model->star * 100);
        };
        $fields['money'] = function ($model){//金钱
            //TO DO
            return 0;
        };

        return ArrayHelper::toArray($model, [$this->modelClass=>$fields],false);
    }
}