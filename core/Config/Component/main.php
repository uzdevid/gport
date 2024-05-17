<?php

use common\Exception\Handler\ExceptionHandler;
use yii\web\AssetManager;
use yii\web\JsonParser;
use yii\web\Response;
use yii\web\User;

return [
    'request' => [
        'baseUrl' => '/core',
        'enableCookieValidation' => false,
        'enableCsrfValidation' => false,
        'enableCsrfCookie' => false,
        'parsers' => [
            'application/json' => JsonParser::class,
        ]
    ],
    'response' => [
        'format' => Response::FORMAT_JSON,
    ],
    'assetManager' => [
        'class' => AssetManager::class,
    ],
    'user' => [
        'identityClass' => User::class,
        'enableSession' => false,
    ],
    'formatter' => [
        'dateFormat' => 'php:d.m.Y',
        'datetimeFormat' => 'php:H:i:s d.m.Y',
        'decimalSeparator' => ',',
        'thousandSeparator' => ' ',
        'currencyCode' => 'UZS',
    ],
    'errorHandler' => [
        'class' => ExceptionHandler::class
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [],
    ],
];