<?php

use common\Component\AuthProvider\AuthProvider;
use common\Component\S3\S3Client;
use common\Dto\Jwt\JwtIdentity;
use common\Service\Sms\SmsProviderInterface;
use yii\console\Application;
use yii\symfonymailer\Mailer;
use yii\web\User;

class Yii {
    public static Application|__Application|\yii\web\Application $app;
}

/**
 * @property yii\rbac\DbManager $authManager
 * @property User|__WebUser $user
 *
 * @property yii\queue\redis\Queue $otpSender
 *
 * @property SmsProviderInterface $smsProvider
 * @property Mailer $securityMailer
 *
 * @property AuthProvider $authProvider
 * @property S3Client $s3Client
 *
 */
class __Application { }

/**
 * @property JwtIdentity $identity
 */
class __WebUser { }