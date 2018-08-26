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
use common\helpers\Util;
use yii\web\UploadedFile;

class User extends \common\models\User implements IdentityInterface
{
    public $chat_count = 0;
    public $is_collected = false;
    public $collect_id = 0;
    public $collect_remark = '';

    public function formName()
    {
        return '';
    }

    public function fields()
    {
        return [
            'id',
            'avatar',
            'nickname',
            'mobile',
            'gender',
            'birthday' => function ($model) {
                return date("Y-m-d", strtotime($model->birthday));
            },
            'education',
            'marriage',
            'children',
            'job',
            'hobby',
            'is_special',
            'price',
            'experience_count',

            //extra
            'is_collected',
            'collect_id',
            'collect_remark',
            'chat_count',
        ];
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
        parent::afterFind();
        if (!Yii::$app->getUser()->getIsGuest()) {
            $loginUserId = Yii::$app->getUser()->getIdentity()->getId();
            $model = UserCollect::findOne(['uid' => $this->id, 'c_uid' => $loginUserId]);
            if (NULL !== $model) {
                $this->is_collected = true;
                $this->collect_id = $model->id;
                $this->collect_remark = $model->remark;
            }
//            $this->is_collected = UserCollect::isCollected($this->id, $loginUserId);
        }
        $this->avatar = Util::getFileRightUrl($this->avatar);
    }

    public function beforeSave($insert)
    {
        if(!$insert) {
            Util::handleModelSingleFileUpload($this, 'avatar', $insert, '@avatar');
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }


    /**
     * @inheritdoc
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
//        if ($insert) {//将用户同步到IM系统中
            if(Yii::$app->qcloudim) {
                $qlcoudim = Yii::$app->qcloudim->client;
                $data = [
                    "Identifier" => strval($this->getId()),
                    "Nick" => $this->nickname,
                    "FaceUrl" => $this->avatar,
                ];

                $result = $qlcoudim->request('im_open_login_svc', 'account_import', $data);
                if ($result['ActionStatus'] === 'OK') {
                    Yii::info($result, 'im');
                } else {
                    Yii::error($result, 'im');
                }
            }
//        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
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
     * 获取用户的余额
     */
    public function getBalance()
    {
        return $this->balance;
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