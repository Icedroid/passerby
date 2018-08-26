<?php

namespace api\modules\v1\actions\user;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\ServerErrorHttpException;
use yii\rest\Action;
use yii\helpers\FileHelper;
use common\helpers\Util;

class UpdateAction extends Action
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

        $model->scenario = $this->scenario;
        $body = Yii::$app->getRequest()->getBodyParams();
        /*if(isset($body['avatar']) && (false === strpos($body['avatar'], 'http') && false === strpos($body['avatar'], 'https'))){
            $uploadPath = yii::getAlias('@avatar');
            if( strpos(strrev($uploadPath), '/') !== 0 ) $uploadPath .= '/';
            if (! FileHelper::createDirectory($uploadPath)) {
                $model->addError('avatar', "Create directory failed " . $uploadPath);
            }
            $fullName = $uploadPath . date('YmdHis') . '_' . uniqid() . '.' . 'png';
            if (! file_put_contents($fullName, $body['avatar'])) {
                $model->addError('avatar', yii::t('app', 'Upload {attribute} error: ',  ['attribute' => yii::t('app', ucfirst('avatar'))]) . ': ' . $fullName);
            }
            $body['avatar'] = str_replace(yii::getAlias('@frontend/web'), '', $fullName);
        }*/
        $model->load($body, '');
        if ($model->save() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }

        if($model->avatar && (false === strpos($model->avatar, 'http') && false === strpos($model->avatar, 'https'))){
            $model->avatar = Util::getFileRightUrl($model->avatar);
        }
        return $model;
    }
}