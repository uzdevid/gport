<?php

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

return $config;
