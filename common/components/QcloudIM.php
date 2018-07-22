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
        self::$_client = new Client($config['sdkappid'], $config['identifier'], 'file://'.$config['private_key'], 'file://'.$config['public_key']);

        return self::$_client;
    }
}
