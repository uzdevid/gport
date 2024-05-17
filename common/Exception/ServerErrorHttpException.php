<?php

namespace common\Exception;

use common\Exception\Message\ServerError;
use Exception;
use ReflectionException;
use Yii;

class ServerErrorHttpException extends \yii\web\ServerErrorHttpException {
    /**
     * @param int|string $code
     * @param mixed $info
     * @param Exception|null $previous
     *
     * @throws ServerErrorHttpException
     * @throws ReflectionException
     */
    public function __construct(int|string $code, mixed $info = null, Exception $previous = null) {
        if (!is_null($info)) {
            Yii::error($info, self::class);
        }

        if (is_string($code)) {
            parent::__construct($code, $code, $previous);
            return;
        }

        parent::__construct(ServerError::message($code), $code, $previous);
    }

    /**
     * @param int $code
     * @param array $replaces
     * @param Exception|null $previous
     *
     * @return ServerErrorHttpException
     * @throws ReflectionException
     * @throws ServerErrorHttpException
     */
    public static function replaceMessage(int $code, array $replaces = [], Exception $previous = null): ServerErrorHttpException {
        $message = str_replace(array_keys($replaces), array_values($replaces), ServerError::message($code));

        return new self($message, $replaces, $previous);
    }
}