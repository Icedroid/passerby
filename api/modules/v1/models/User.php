<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 19:04
 */

namespace api\modules\v1\models;

use Yii;
use yii\web\IdentityInterface;

class User extends \common\models\User implements IdentityInterface
{
    public $chat_count = 0;
    public $is_collected = false;
    public $collect_id = 0;
    public $collect_remark = '';

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['auth_key'], $fields['openid'], $fields['session_key'], $fields['status'], $fields['star'], $fields['star_count'],
            $fields['view_count'], $fields['help_count'],  $fields['created_at'], $fields['updated_at']);
        $fields['price'] = function ($model) {
            return intval($model->price);
        };
        $fields['birthday'] = function ($model) {
            return date("Y-m-d", strtotime($model->birthday));
        };
//        $fields['star'] = function ($model) {
//            return intval($model->star * 100);
//        };
        $fields['is_collected'] = 'is_collected';
        $fields['collect_id'] = 'collect_id';
        $fields['collect_remark'] = 'collect_remark';
        //TO DO 聊天次数
        $fields['chat_count'] = 'chat_count';
//        $fields['access_token'] = 'auth_key';
        return $fields;
    }

    public function beforeValidate()
    {
//        $requestParams = Yii::$app->getRequest()->getBodyParams();
//        if (empty($requestParams)) {
//            $requestParams = Yii::$app->getRequest()->getQueryParams();
//        }
//        if (isset($requestParams['access_token'])) {
//            $this->auth_key = $requestParams['access_token'];
//        }
//        if(isset($requestParams['code'])){
//            $app = Yii::$app->wechat->miniProgram;
//            $app->auth->session($requestParams['code']);
//        }

        return parent::beforeValidate();
    }

    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        if (!Yii::$app->getUser()->getIsGuest()) {
            $loginUserId = Yii::$app->getUser()->getIdentity()->getId();
            $model = UserCollect::findOne(['uid'=>$this->id, 'c_uid'=>$loginUserId]);
            if(NULL !== $model){
                $this->is_collected = true;
                $this->collect_id = $model->id;
                $this->collect_remark = $model->remark;
            }
//            $this->is_collected = UserCollect::isCollected($this->id, $loginUserId);
        }
        parent::afterFind();
    }

    /**
     * @param $loginForm \api\modules\v1\models\form\LoginForm::class
     */
    public function loadByLoginForm($loginForm)
    {
        if (!$this->auth_key) {
            $this->addError('auth_key', 'auth_key is experied');
            return false;
        }

        $sign = sha1(htmlspecialchars_decode($loginForm->rawData . $this->session_key));
        if ($sign !== $loginForm->signature) {
            $this->addError('auth_key', "sign error");
            return false;
        }

        try {
            $app = Yii::$app->wechat->miniProgram;
            $userInfo = $app->encryptor->decryptData($this->session_key, $loginForm->iv, $loginForm->encryptedData);
            if ($userInfo) {
                $this->avatar = $userInfo['avatarUrl'];
                $this->gender = intval($userInfo['gender']);
                $this->nickname = $userInfo['nickName'];
            }
        } catch (\Exception $e) {
            $this->addError('auth_key', $e->getMessage());
            return false;
        }
        return true;
    }

    public function generateAccessToken()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * return openId
     */
    public function getOpenId()
    {
        return $this->openid;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     *
     */
    public static function findIdentityByOpenId($openId)
    {
        return static::findOne(['openid' => $openId]);
    }
}