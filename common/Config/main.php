<?php

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'timezone' => 'UTC',
    'defaultRoute' => 'app',
    'bootstrap' => [],
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'components' => require __DIR__ . '/Component/main.php',
];
