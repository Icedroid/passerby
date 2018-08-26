<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'Passerby API',
    'basePath' => dirname(__DIR__),
    'language' => 'zh-CN',//默认语言
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
            'identityClass' => api\modules\v1\models\User::className(),
            'enableSession' => false,
            'loginUrl' => null,
        ],
        'log' => [//此项具体详细配置，请访问http://wiki.feehi.com/index.php?title=Yii2_log
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::className(),//当触发levels配置的错误级别时，保存到日志文件
                    'levels' => ['info', 'error', 'warning'],
                    'categories' => [
                        'yii\db\*',
                        'yii\web\HttpException:*',
                        'wechat',
                    ],
                    'except' => [
                        'yii\web\HttpException:404',
                    ],
                    'logVars' => [],
                ],
            ],
        ],
        'cache' => [
//            'class' => yii\caching\DummyCache::className(),
            'class' => yii\caching\FileCache::className(),//使用文件缓存，可根据需要改成apc redis memcache等其他缓存方式
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
                'GET v1/login' => 'v1/default/login',
                'GET v1/helps/search' => 'v1/help/search',
                'POST v1/charge' => 'v1/order/index',
                'v1/notify' => 'v1/notify/index',
                'POST v1/withdrawal' => 'v1/order/withdrawal',
                'POST v1/send-gift' => 'v1/order/send-gift',
                'POST v1/complain' => 'v1/order/complain',
                'GET v1/consumes' => 'v1/order/consume',
                [
                    'class' => yii\rest\UrlRule::className(),
                    'controller' => ['v1/user-collect', 'v1/user-experience', 'v1/help', 'v1/help-comment', 'v1/user-star', 'v1/feedback'],
                    'patterns' => [
                        'POST {id}' => 'update',
                        'POST delete/{id}' => 'delete',
                        'GET,HEAD {id}' => 'view',
                        'POST' => 'create',
                        'GET,HEAD' => 'index',
                    ],
                ],
                [
                    'class' => yii\rest\UrlRule::className(),
                    'controller' => ['v1/user'],
                    'patterns' => [
                        'POST' => 'update',
                        'GET,HEAD {id}' => 'view',
                        'GET,HEAD' => 'index',
                    ],
                    'extraPatterns' => [
                        'POST wechat' => 'update-by-wechat',
                        'GET profile' => 'profile',
                    ],
                ],
            ],
        ],
        'wechat' => [
            'class' => 'jianyan\easywechat\Wechat',
            // 'userOptions' => []  # 用户身份类参数
            // 'sessionParam' => '' # 微信用户信息将存储在会话在这个密钥
            // 'returnUrlParam' => '' # returnUrl 存储在会话中
        ],
        'qcloudim' => [
          'class' =>common\components\QcloudIM::className(),
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
                if ($response->statusCode == 204) {//delete request return empty response
                    $response->data = [
                        'code' => 200,
                        'msg' => 'ok',
                        'data' => [],
                    ];
                    $response->statusCode = 200;
                    return;
                }
                if ($response->data !== null) {
                    $data = $response->data;
                    $response->data = [
                        'code' => $response->isSuccessful ? 200 : $response->statusCode,
                        'msg' => $response->statusText,
                        'data' => $data,
                    ];
                    if ($response->statusCode == 201){
                        $response->setStatusCode(200);
                        $response->getHeaders()->remove('Location');
                        return;
                    }
                    if (!$response->isSuccessful) {
                        if (!empty($data) && is_array($data)) {
                            //422: 数据验证失败 (例如，响应一个 POST 请求)。 请检查响应体内详细的错误消息。
                            if ($response->statusCode == 422 && isset($data[0]) && isset($data[0]['message'])) {
                                $response->data['msg'] = $data[0]['message'];
                            }elseif (isset($data['message'])) {
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
