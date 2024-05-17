<?php

use yii\db\Connection;

return [
    'class' => Connection::class,
    'dsn' => "pgsql:host={$_ENV['GPORT_DB_HOST']};dbname={$_ENV['GPORT_DB_NAME']}",
    'username' => $_ENV['GPORT_DB_USER'],
    'password' => $_ENV['GPORT_DB_PASS'],
    'charset' => $_ENV['GPORT_DB_CHARSET'] ?? 'utf8',
    //
    'enableSchemaCache' => true,
    'schemaCache' => 'cache',
    'schemaCacheDuration' => 3600,
    //
    'enableQueryCache' => true,
    'queryCache' => 'cache',
    'queryCacheDuration' => 10
];