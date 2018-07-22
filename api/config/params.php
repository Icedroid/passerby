<?php
return [
    'adminEmail' => 'admin@example.com',

    // 微信支付配置 具体可参考EasyWechat
    'wechatPaymentConfig' => [
        // 前面的appid什么的也得保留哦
        'app_id' => 'wxdaf214870e394d3c',
        'mch_id' => '1489976032',
        'key' => '98209766a3804e2c949b136383594bc8',

        //// 如需使用敏感接口（如退款、发送红包等）需要配置 API 证书路径(登录商户平台下载 API 证书)
        'cert_path' => dirname(dirname(__DIR__)) . '/cert/wechatpay/apiclient_cert.pem', // XXX: 绝对路径！！！！
        'key_path' => dirname(dirname(__DIR__)) . '/cert/wechatpay/apiclient_key.pem', // XXX: 绝对路径！！！！
        'notify_url' => 'https://api.cngoldwashing.com/api/v1/notify',     // 你也可以在下单时单独设置来想覆盖它
        // 'device_info'     => '013467007045764',
        // 'sub_app_id'      => '',
        // 'sub_merchant_id' => '',

//        'sandbox' => true, // 设置为 false 或注释则关闭沙箱模式
    ],

    // 微信小程序配置 具体可参考EasyWechat
    'wechatMiniProgramConfig' => [
        /**
         * Debug 模式，bool 值：true/false
         *
         * 当值为 false 时，所有的日志都不会记录
         */
        'debug' => true,
        /**
         * 账号基本信息，请从微信公众平台/开放平台获取
         */
        'app_id' => 'wxdaf214870e394d3c',                  // AppID
        'secret' => '3f17dc166fbb2aec546355ec3f2a91e1',    // AppSecret
        'token' => '',                                    // Token
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
            'level' => 'debug',
            'permission' => 0777,
            'file' => dirname(dirname(__DIR__)) . '/api/runtime/logs/easywechat.log',
        ],
    ],

    'qcloudim' => [
        'sdkappid' => '1400112194',
        'identifier' => 'administrator',
        'private_key' => dirname(dirname(__DIR__)) . '/cert/qcloudim/private_key', // XXX: 绝对路径！！！！
        'public_key' => dirname(dirname(__DIR__)) . '/cert/qcloudim/public_key', // XXX: 绝对路径！！！！
    ],
];
