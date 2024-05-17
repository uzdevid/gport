<?php
return [
    'Development' => [
        'path' => 'development',
        'setWritable' => [
            'console/runtime',
            'socket/runtime',
            //
            'core/runtime',
            'core/Rest/assets',
            //
            'proxy/runtime',
            'proxy/Web/assets',
        ],
        'setExecutable' => ['yii'],
    ],
    'Production' => [
        'path' => 'production',
        'setWritable' => [
            'console/runtime',
            'socket/runtime',
            //
            'core/runtime',
            'core/Rest/assets',
            //
            'proxy/runtime',
            'proxy/Web/assets',
        ],
        'setExecutable' => ['yii'],
    ],
];
