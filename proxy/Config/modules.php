<?php

use yii\debug\Module as Debug;
use yii\gii\Module as Gii;

return [
    'debug' => [
        'class' => Debug::class,
        'allowedIPs' => ['*']
    ],
    'gii' => [
        'class' => Gii::class,
        'allowedIPs' => ['*']
    ]
];