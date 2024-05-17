<?php

use common\Component\AuthProvider\AuthProvider;
use common\Component\AuthProvider\TokenProvider\HeaderTokenProvider;
use common\Component\DeviceManager\DeviceManager;
use common\Component\DeviceManager\TokenProvider\HeaderTokenProvider as DeviceHeaderTokenProvider;
use common\Dto\Jwt\JwtIdentity;
use UzDevid\WebSocket\Client\WebSocketClient;
use yii\web\AssetManager;
use yii\web\JsonParser;
use yii\web\Response;

return [
    'request' => [
        'baseUrl' => '',
        'enableCookieValidation' => false,
        'enableCsrfValidation' => false,
        'enableCsrfCookie' => false,
        'parsers' => [
            'application/json' => JsonParser::class,
        ]
    ],
    'response' => [
        'format' => Response::FORMAT_HTML,
    ],
    'webSocketClient' => [
        'class' => WebSocketClient::class,
        'host' => 'localhost',
        'port' => 8080,
        'url' => ''
    ],
    'assetManager' => [
        'class' => AssetManager::class,
    ],
    'authProvider' => [
        'class' => AuthProvider::class,
        'tokenProvider' => HeaderTokenProvider::class,
        'secret' => $_ENV['UZDEVID_SERVICE_SECRET'],
        'algo' => $_ENV['UZDEVID_SERVICE_ENCRYPT_ALGO']
    ],
    'user' => [
        'identityClass' => JwtIdentity::class,
        'enableSession' => false,
    ],
    'deviceManager' => [
        'class' => DeviceManager::class,
        'tokenProvider' => DeviceHeaderTokenProvider::class,
        'secret' => $_ENV['DEVICE_TOKEN_ENCRYPT_KEY'],
        'algo' => $_ENV['DEVICE_TOKEN_ENCRYPT_ALGO'],
    ],
    'formatter' => [
        'dateFormat' => 'dd.MM.yyyy',
        'datetimeFormat' => 'H:i:s dd.MM.yyyy',
        'decimalSeparator' => ',',
        'thousandSeparator' => ' ',
        'currencyCode' => 'UZS',
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
            '<module>/<controller>/<action>' => 'app/index',
            '<url:.+>' => 'app/index'
        ],
    ],
];