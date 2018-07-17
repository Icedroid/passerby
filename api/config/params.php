<?php
return [
    'adminEmail' => 'admin@example.com',
    // 微信小程序配置 具体可参考EasyWechat
    'wechatMiniProgramConfig' => [
        /**
         * Debug 模式，bool 值：true/false
         *
         * 当值为 false 时，所有的日志都不会记录
         */
        'debug'  => true,
        /**
         * 账号基本信息，请从微信公众平台/开放平台获取
         */
        'app_id'  => 'wxdaf214870e394d3c',                  // AppID
        'secret'  => '3f17dc166fbb2aec546355ec3f2a91e1',    // AppSecret
        'token'   => '',                                    // Token
        'aes_key' => '',                                    // EncodingAESKey，安全模式下请一定要填写！！！

        // 下面为可选项
        // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
        'response_type' => 'array',

        /**
         * 日志配置
         *
         * level: 日志级别, 可选为：
         *         debug/info/notice/warning/error/critical/alert/emergency
         * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
         * file：日志文件位置(绝对路径!!!)，要求可写权限
         */
        'log' => [
            'level'      => 'debug',
            'permission' => 0777,
            'file'       => dirname(dirname(__DIR__)) . '/api/runtime/logs/easywechat.log',
        ],
        /**
         * OAuth 配置
         *
         * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
         * callback：OAuth授权完成后的回调页地址
         */
        'oauth' => [
            'scopes'   => ['snsapi_userinfo'],
            'callback' => "http://api.chujijiudai.com",
        ],
        /**
         * 微信支付
         */
        'payment' => [
            'merchant_id'        => '1464588202',
            'key'                => 'chujijiudaichujijiudaichujijiuda',
            'cert_path'          => dirname(dirname(__DIR__)) . '/cert/apiclient_cert.pem', // XXX: 绝对路径！！！！
            'key_path'           => dirname(dirname(__DIR__)) . '/cert/apiclient_key.pem', // XXX: 绝对路径！！！！
        ],
        /**
         * Guzzle 全局设置
         *
         * 更多请参考： http://docs.guzzlephp.org/en/latest/request-options.html
         */
        'guzzle' => [
            'timeout' => 5.0, // 超时时间（秒）
            'verify' => false, // 关掉 SSL 认证（强烈不建议！！！）
        ],
    ],
];
