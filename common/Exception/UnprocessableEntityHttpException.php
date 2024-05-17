<?php

namespace common\Exception;

use common\Exception\Message\UnprocessableEntity;
use Exception;
use ReflectionException;

class UnprocessableEntityHttpException extends \yii\web\UnprocessableEntityHttpException {
    public array|null $errors;

    /**
     * @param int $code
     * @param array|null $errors
     * @param Exception|null $previous
     *
     * @throws ServerErrorHttpException
     * @throws ReflectionException
     */
    public function __construct(int $code, array|null $errors = null, Exception $previous = null) {
        $this->errors = $errors;
        parent::__construct(UnprocessableEntity::message($code), $code, $previous);
    }
}