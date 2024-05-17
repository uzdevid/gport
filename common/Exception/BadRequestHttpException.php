<?php

namespace common\Exception;

use common\Exception\Message\BadRequest;
use Exception;
use ReflectionException;

class BadRequestHttpException extends \yii\web\BadRequestHttpException {
    /**
     * @param int|string $code
     * @param Exception|null $previous
     *
     * @throws ServerErrorHttpException
     * @throws ReflectionException
     */
    public function __construct(int|string $code, Exception $previous = null) {
        parent::__construct(BadRequest::message($code), $code, $previous);
    }
}