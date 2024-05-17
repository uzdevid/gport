<?php

use yii\redis\Connection;

return [
    'class' => Connection::class,
    'hostname' => $_ENV['REDIS_HOST'],
    'port' => $_ENV['REDIS_PORT'],
    'username' => $_ENV['REDIS_USERNAME'],
    'password' => $_ENV['REDIS_PASSWORD']
];