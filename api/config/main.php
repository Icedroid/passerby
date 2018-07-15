<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'Chevr API',
    'basePath' => dirname(__DIR__),
//    'language' => 'zh-CN',//默认语言
    'timeZone' => 'Asia/Shanghai',//默认时区
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'components' => [
        'user' => [
            'class' => yii\web\User::className(),
            'identityClass' => api\modules\v1\models\CarAgency::className(),
            'enableSession' => false,
            'loginUrl' => null,
        ],
        'log' => [//此项具体详细配置，请访问http://wiki.feehi.com/index.php?title=Yii2_log
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::className(),//当触发levels配置的错误级别时，保存到日志文件
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'cache' => [
            'class' => yii\caching\DummyCache::className(),
            'keyPrefix' => 'api',       // 唯一键前缀
        ],
        'i18n' => [
            'translations' => [//多语言包设置
                'app*' => [
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'v1/default/index',
                'v1/login' => 'v1/default/login',
                'v1/config' => 'v1/default/config',
                'v1/feedback' => 'v1/default/feedback',
                'v1/experience' => 'v1/default/experience',
                [
                    'class' => yii\rest\UrlRule::className(),
                    'controller' => ['v1/car', 'v1/user', 'v1/article'],
                ],
            ],
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'text/json' => 'yii\web\JsonParser',
            ],
            'enableCsrfValidation' => false,
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => yii\web\JsonResponseFormatter::class,
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                    // ...
                ],
            ],
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null) {
                    $data = $response->data;
                    $response->data = [
                        'code' => $response->isSuccessful ? 1 : $response->statusCode,
                        'msg' => $response->statusText,
                        'data' => $data,
                    ];
                    if (!$response->isSuccessful) {
                        if (!empty($data) && is_array($data)) {
                            //422: 数据验证失败 (例如，响应一个 POST 请求)。 请检查响应体内详细的错误消息。
                            if ($response->statusCode == 422 && isset($data[0]) && isset($data[0]['message'])) {
                                $response->data['msg'] = $data[0]['message'];
                            } elseif (isset($data['message'])) {
                                $response->data['msg'] = $data['message'];
                            }
                            $response->data['data'] = [];
                        }
                    }
                    $response->statusCode = 200;
                }
            },
        ],
    ],
    'params' => $params,
];
