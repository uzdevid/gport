<?php

use yii\log\FileTarget;
use yii\queue\redis\Queue;
use yii\redis\Cache;

return [
    'db' => require __DIR__ . '/../Database/gport.php',
    'redis' => require __DIR__ . '/../Database/redis.php',
    //
    'queue' => [
        'class' => Queue::class,
        'redis' => 'redis',
        'channel' => 'queue'
    ],
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => FileTarget::class,
                'levels' => ['error'],
            ]
        ],
    ],
    'cache' => Cache::class
];