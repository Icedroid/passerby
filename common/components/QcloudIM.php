<?php
namespace common\components;

use Yii;
use yii\base\Component;
use common\helpers\qcloudim\Client;

/**
 * Class QcloudIM
 */
class QcloudIM extends Component
{
    private $_identifiter;

    /**
     * QcLoud im
     *
     * @var http client
     */
    private static $_client;

    /**
     * 获取 QCloud IM Http Client
     *
     * @return Factory
     */
    public function getClient()
    {
        $config = Yii::$app->params['qcloudim'];
        if(!$this->_identifiter){
           $this->_identifiter = $config['identifier'];
        }
        self::$_client = new Client($config['sdkappid'], $this->_identifiter, 'file://'.$config['private_key'], 'file://'.$config['public_key']);

        return self::$_client;
    }

    public function setIdentifiter($identifiter)
    {
        $this->_identifiter = $identifiter;
    }
}
