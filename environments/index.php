<?php
return [
    'Development' => [
        'path' => 'development',
        'setWritable' => [
            'console/runtime',
            //
            'mobile/runtime',
            'mobile/Rest/assets',
            //
            'core/runtime',
            'core/Rest/assets',
            //
            'admin/runtime',
            'admin/Rest/assets',
        ],
        'setExecutable' => ['yii'],
    ],
    'Production' => [
        'path' => 'production',
        'setWritable' => [
            'console/runtime',
            //
            'mobile/runtime',
            'mobile/Rest/assets',
            //
            'core/runtime',
            'core/Rest/assets',
            //
            'admin/runtime',
            'admin/Rest/assets',
        ],
        'setExecutable' => ['yii'],
    ],
];
