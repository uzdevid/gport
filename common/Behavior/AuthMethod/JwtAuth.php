<?php

namespace common\Behavior\AuthMethod;

use common\Component\AuthProvider\AuthProvider;
use common\Dto\Jwt\JwtIdentity;
use common\Exception\Message\Unauthorized;
use common\Exception\UnauthorizedHttpException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use UnexpectedValueException;
use Yii;
use yii\base\InvalidConfigException;
use yii\filters\auth\AuthMethod;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;
use Yiisoft\Hydrator\Hydrator;

class JwtAuth extends AuthMethod {
    public string $authProvider = 'authProvider';

    /**
     * @param $user
     * @param $request
     * @param $response
     *
     * @return IdentityInterface
     * @throws UnauthorizedHttpException
     * @throws InvalidConfigException
     */
    public function authenticate($user, $request, $response): IdentityInterface {
        /** @var AuthProvider $authProvider */
        $authProvider = Yii::$app->get($this->authProvider);

        try {
            $jwtPayload = JWT::decode($authProvider->tokenProvider->getToken(), new Key($authProvider->secret, $authProvider->algo));
        } catch (SignatureInvalidException|UnexpectedValueException $exception) {
            throw new UnauthorizedHttpException(Unauthorized::INVALID_AUTHORIZATION_TOKEN, $exception);
        }

        /** @var JwtIdentity $payload */
        $payload = (new Hydrator())->create(JwtIdentity::class, ArrayHelper::toArray($jwtPayload));

        if ((strtotime($payload->Session->created_time) + $payload->Session->lifetime) < time()) {
            throw new UnauthorizedHttpException(Unauthorized::AUTHORIZATION_TOKEN_LIFETIME_HAS_EXPIRED);
        }

        $user->login($payload);

        return $payload;
    }
}