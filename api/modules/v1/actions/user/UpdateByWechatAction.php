<?php

namespace api\modules\v1\actions\user;

use api\modules\v1\models\form\LoginForm;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\ServerErrorHttpException;
use yii\rest\Action;

class UpdateByWechatAction extends Action
{
    /**
     * @var string the scenario to be assigned to the model before it is validated and updated.
     */
    public $scenario = Model::SCENARIO_DEFAULT;


    /**
     * Updates an existing model.
     * @param string $id the primary key of the model.
     * @return \yii\db\ActiveRecordInterface the model being updated
     * @throws ServerErrorHttpException if there is any error when updating the model
     */
    public function run($id = null)
    {
        /* @var $model ActiveRecord */
        $model = $this->findModel(Yii::$app->getUser()->getIdentity()->getId());

        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }

        //保存一次不再保存
        if($model->avatar && $model->nickname)
        {
            return $model;
        }

        $loginForm = new LoginForm();
        $loginForm->load(Yii::$app->getRequest()->getBodyParams(), '');

        $model->scenario = $this->scenario;
        $model->loadByLoginForm($loginForm);
        if($model->hasErrors()){
            return $model;
        }
        if ($model->save() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }

        return $model;
    }
}