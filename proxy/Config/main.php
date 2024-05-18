<?php

use common\Bootstrap\ClientLanguage;

$params = array_merge(
    require __DIR__ . '/../../common/Config/params.php',
    require __DIR__ . '/../../common/Config/Local/params.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/Local/params.php'
);

return [
    'id' => 'gport-proxy',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [ClientLanguage::class],
    'controllerNamespace' => 'proxy\Controller',
    'defaultRoute' => 'app',
    'catchAll' => ['app/index'],
    'modules' => require __DIR__ . '/modules.php',
    'components' => require __DIR__ . '/Component/main.php',
    'params' => $params,
];