<?php

namespace common\Exception;

use common\Exception\Message\Forbidden;
use Exception;
use ReflectionException;

class ForbiddenHttpException extends \yii\web\ForbiddenHttpException {
    /**
     * @param int $code
     * @param Exception|null $previous
     *
     * @throws ServerErrorHttpException
     * @throws ReflectionException
     */
    public function __construct(int $code, Exception $previous = null) {
        parent::__construct(Forbidden::message($code), $code, $previous);
    }
}