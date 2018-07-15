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
use api\modules\v1\models\CarAgency;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $access_token;
    public $accountCode;
    public $accountName;
    public $brandCode;
    public $dossBrandId;
    public $mobile;
    public $positionCode;
    public $positionId;
    public $positionName;
    public $saleCode;
    public $serviceCode;
    public $storeCode;
    public $storeName;
    public $storeShortName;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['access_token', 'accountCode', 'mobile'], 'required'],
            [['accountCode', 'accountName', 'mobile', 'positionCode', 'positionId', 'positionName', 'saleCode', 'serviceCode', 'storeName', 'storeShortName'], 'string', 'max'=>255],
            [['brandCode', 'dossBrandId', 'storeCode'], 'integer'],
            [['mobile'], 'unique'],
            [['access_token'], 'unique'],
            [['accountCode'], 'unique'],
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
            $this->_user = CarAgency::findIdentityByAccessToken($this->access_token);
        }

        return $this->_user;
    }

}
