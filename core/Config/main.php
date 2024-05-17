<?php

use common\Bootstrap\ResponseFormat;

$params = array_merge(
    require __DIR__ . '/../../common/Config/params.php',
    require __DIR__ . '/../../common/Config/Local/params.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/Local/params.php'
);

return [
    'id' => 'meet-core',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', ResponseFormat::class],
    'controllerNamespace' => 'core\controllers',
    'modules' => require __DIR__ . '/modules.php',
    'components' => require __DIR__ . '/Component/main.php',
    'params' => $params,
];