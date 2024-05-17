<?php

namespace common\Exception;

use common\Exception\Message\NotFound;
use Exception;
use ReflectionException;

class NotFoundHttpException extends \yii\web\NotFoundHttpException {
    /**
     * @param int $code
     * @param Exception|null $previous
     *
     * @throws ServerErrorHttpException
     * @throws ReflectionException
     */
    public function __construct(int $code, Exception $previous = null) {
        parent::__construct(NotFound::message($code), $code, $previous);
    }
}