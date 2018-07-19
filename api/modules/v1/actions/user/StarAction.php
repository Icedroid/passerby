<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace api\modules\v1\actions\user;

use Yii;
use yii\base\Model;
use yii\rest\Action;
use yii\web\ServerErrorHttpException;

class StarAction extends Action
{
    /**
     * @var string the scenario to be assigned to the new model before it is validated and saved.
     */
    public $scenario = Model::SCENARIO_DEFAULT;

    /**
     * Creates a new model.
     * @return \yii\db\ActiveRecordInterface the model newly created
     * @throws ServerErrorHttpException if there is any error when creating the model
     */
    public function run()
    {
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id);
        }

        /* @var $model \yii\db\ActiveRecord */
        $model = new $this->modelClass([
            'scenario' => $this->scenario,
        ]);

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if(!$model->validate()){
            return $model;
        }

        $userStar = ($this->modelClass)::findOne(['uid'=>$model->uid, 'star_uid'=>$model->star_uid]);
        if(NULL === $userStar){
            if($model->save(false)){
                return [];
            }elseif($model->hasErrors()){
                return $model;
            }else{
                throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
            }
        }else{
            $userStar->load(Yii::$app->getRequest()->getBodyParams(), '');
            if($userStar->save()){
                return [];
            }elseif($userStar->hasErrors()){
                return $userStar;
            }else{
                throw new ServerErrorHttpException('Failed to create the object for unknown reason.');

            }
        }
        return [];
    }
}
