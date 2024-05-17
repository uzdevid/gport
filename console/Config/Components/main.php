<?php

use yii\log\FileTarget;

return [
    'log' => [
        'targets' => [
            [
                'class' => FileTarget::class,
                'levels' => ['error', 'warning'],
            ],
        ],
    ],
];