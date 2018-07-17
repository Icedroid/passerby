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

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['auth_key'], $fields['status'], $fields['created_at'], $fields['updated_at']);
        $fields['access_token'] = 'auth_key';
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
     * @param $loginForm \api\modules\v1\models\form\LoginForm::class
     */
    public function setAttributesByLoginForm($loginForm)
    {
        if (!($oauth = yii::$app->cache->get($loginForm->auth_key))) {
            $this->addError('auth_key', 'auth_key is experied');
            return false;
        }

        $sign = sha1(htmlspecialchars_decode($loginForm->rawData . $oauth['session_key']));
        if ($sign !== $loginForm->signature) {
            $this->addError('auth_key', "sign error");
            return false;
        }

        try {
            $app = Yii::$app->wechat->miniProgram;
            $userInfo = $app->encryptor->decryptData($oauth['session_key'], $loginForm->iv, $loginForm->encryptedData);
            if ($userInfo) {
                $this->generateAccessToken();
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
        return static::findOne(['auth_key' => $token]);
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
}