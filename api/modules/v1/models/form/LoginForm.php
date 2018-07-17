<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */
namespace api\modules\v1\models\form;

use yii;
use yii\base\Model;
use api\modules\v1\models\User;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $auth_key;
    public $userInfo;
    public $rawData;
    public $signature;
    public $encryptedData;
    public $iv;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['auth_key', 'rawData', 'signature', 'encryptedData', 'iv'], 'required'],
            [['auth_key', 'rawData', 'signature', 'encryptedData', 'iv'], 'string', 'max'=>255],
        ];
    }


    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (! $this->hasErrors()) {
            $user = $this->getUser();
            if (! $user || ! $user->validatePassword($this->password)) {
                $this->addError($attribute, yii::t('app', 'Incorrect username or password.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findIdentityByAccessToken($this->auth_key);
        }

        return $this->_user;
    }

}
