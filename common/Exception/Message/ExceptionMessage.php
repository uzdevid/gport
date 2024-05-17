<?php

namespace common\Exception\Message;

use common\Exception\ServerErrorHttpException;
use ReflectionClass;
use ReflectionException;

abstract class ExceptionMessage {
    protected static array $messages = [];

    /**
     * @param int $code
     *
     * @return string
     * @throws ReflectionException
     * @throws ServerErrorHttpException
     */
    public static function message(int $code): string {
        return self::$messages[$code] ?? ucfirst(strtolower(str_replace('_', ' ', self::getConstantName($code))));
    }

    /**
     * @throws ServerErrorHttpException
     * @throws ReflectionException
     */
    private static function getConstantName(int $code): bool|string {
        $fooClass = new ReflectionClass(new (static::class));
        $constants = $fooClass->getConstants();

        foreach ($constants as $name => $value) {
            if ($value === $code) {
                return $name;
            }
        }

        throw ServerErrorHttpException::replaceMessage(ServerError::UNKNOWN_ERROR_CODE, ['{code}' => $code]);
    }
}