<?php

use common\Dto\Jwt\JwtIdentity;
use UzDevid\WebSocket\Client\WebSocketClient;
use yii\console\Application;
use yii\queue\redis\Queue;
use yii\web\User;

class Yii {
    public static Application|__Application|\yii\web\Application $app;
}

/**
 * @property yii\rbac\DbManager $authManager
 * @property User|__WebUser $user
 *
 * @property WebSocketClient $webSocketClient
 * @property Queue $queue
 */
class __Application { }

/**
 * @property JwtIdentity $identity
 */
class __WebUser { }