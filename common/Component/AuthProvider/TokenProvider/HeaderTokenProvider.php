<?php

namespace common\Component\AuthProvider\TokenProvider;

use common\Component\AuthProvider\TokenProviderInterface;
use common\Exception\Message\BadRequest;
use common\Exception\Message\Unauthorized;
use common\Exception\UnauthorizedHttpException;
use Yii;

class HeaderTokenProvider implements TokenProviderInterface {
    public const AUTH_HEADER = 'Authorization';

    /**
     * @return string
     * @throws UnauthorizedHttpException
     */
    public function getToken(): string {
        $bearer = Yii::$app->request->headers->get(self::AUTH_HEADER);

        if (is_null($bearer)) {
            throw new UnauthorizedHttpException(Unauthorized::MISSING_AUTHORIZATION_HEADER);
        }

        if (!preg_match('/^Bearer\s+(.*?)$/', $bearer, $matches)) {
            throw new UnauthorizedHttpException(BadRequest::INVALID_AUTHORIZATION_HEADER);
        }
        
        return $matches[1];
    }
}