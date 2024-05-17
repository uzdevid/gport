<?php

use yii\debug\Module as DebugModule;
use yii\gii\Module as GiiModule;

$params = array_merge(
    require __DIR__ . '/../../../common/Config/params.php',
    require __DIR__ . '/../../../common/Config/Local/params.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/../params.php'
);

$config = [
    'components' => require __DIR__ . '/../Component/main.php',
    'params' => $params,
];

$config['bootstrap'][] = 'debug';
$config['modules']['debug'] = [
    'class' => DebugModule::class,
    'allowedIPs' => ['*'],
];

$config['bootstrap'][] = 'gii';
$config['modules']['gii'] = [
    'class' => GiiModule::class,
];

return $config;
