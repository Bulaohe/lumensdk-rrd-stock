<?php

return [
    //网关
    'gateway' => env('SSDK_STOCK_GATEWAY', ''),

    //接口入口地址
    'entrance' => env('SSDK_STOCK_ENTRANCE', '/router/rest'),

    //请求超时,默认5s
    'request_timeout' => env('SSDK_STOCK_REQUEST_TIMEOUT', 5),

    //请求尝试次数,默认2次,不超过3次
    'try_times' => env('SSDK_STOCK_TRY_TIMES', 2),

    //版本
    'site' => env('SSDK_STOCK_SITE', 'tester'),

    //场景
    'callerid' => env('SSDK_STOCK_CALLER_ID', 'tester'),

    //服务标识
    'service_name' => env('SSDK_STOCK_SERVICE_NAME', 'stock_service'),

    //日志目录
    'log_path' => env('SSDK_STOCK_LOG_PATH', '/data/nginx_log/job'),

    //日志名称
    'log_name' => env('SSDK_STOCK_LOG_NAME', 'stock_service'),

    //日志开关，默认打开
    'log_switch' => env('SSDK_STOCK_LOG_SWITCH', 1),
];
