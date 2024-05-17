<?php

(Dotenv\Dotenv::createImmutable(__DIR__ . '/../../', ['.env']))->load();

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@proxy', dirname(__DIR__, 2) . '/proxy');
Yii::setAlias('@console', dirname(__DIR__, 2) . '/console');
Yii::setAlias('@socket', dirname(__DIR__, 2) . '/socket');