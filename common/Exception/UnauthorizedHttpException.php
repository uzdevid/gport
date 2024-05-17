<?php

namespace common\Exception;

use common\Exception\Message\Unauthorized;
use Exception;

class UnauthorizedHttpException extends \yii\web\UnauthorizedHttpException {
    /**
     * @param int $code
     * @param Exception|null $previous
     *
     * @throws ServerErrorHttpException
     * @throws \ReflectionException
     */
    public function __construct(int $code, Exception $previous = null) {
        parent::__construct(Unauthorized::message($code), $code, $previous);
    }
}