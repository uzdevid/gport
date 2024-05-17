<?php

namespace common\Component\AuthProvider\TokenProvider;

use common\Component\AuthProvider\TokenProviderInterface;
use common\Dto\Jwt\JwtIdentity;
use common\Exception\Message\Unauthorized;
use common\Exception\UnauthorizedHttpException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Cookie;
use Yiisoft\Hydrator\Hydrator;

class CookieTokenProvider implements TokenProviderInterface {
    public string $cookieName = '_AT';

    /**
     * @param string $token
     * @return void
     */
    public function setToken(string $token): void {
        $jwtPayload = JWT::decode($token, new Key($_ENV['UZDEVID_SERVICE_SECRET'], $_ENV['UZDEVID_SERVICE_ENCRYPT_ALGO']));

        /** @var JwtIdentity $payload */
        $payload = (new Hydrator())->create(JwtIdentity::class, ArrayHelper::toArray($jwtPayload));

        Yii::$app->response->cookies->add(new Cookie([
            'name' => $this->cookieName,
            'value' => $token,
            'expire' => strtotime($payload->Session->created_time) + $payload->Session->lifetime,
            'httpOnly' => true,
        ]));
    }

    /**
     * @return string
     * @throws UnauthorizedHttpException
     */
    public function getToken(): string {
        $token = Yii::$app->request->cookies->get($this->cookieName);

        if (is_null($token)) {
            throw new UnauthorizedHttpException(Unauthorized::YOUR_ARE_NOT_AUTHORIZED);
        }

        return $token;
    }
}