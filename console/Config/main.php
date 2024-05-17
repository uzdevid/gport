<?php

use yii\console\controllers\MigrateController;

$params = array_merge(
    require __DIR__ . '/../../common/Config/params.php',
    require __DIR__ . '/../../common/Config/Local/params.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/Local/params.php'
);

return [
    'id' => 'gport-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'queue'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'controllerNamespace' => 'console\Controller',
    'controllerMap' => [
        'migrate' => [
            'class' => MigrateController::class,
            'migrationPath' => '@console/Migration',
        ]
    ],
    'components' => require __DIR__ . '/Components/main.php',
    'params' => $params,
];
