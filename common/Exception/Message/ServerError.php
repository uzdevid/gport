<?php

namespace common\Exception\Message;

class ServerError extends ExceptionMessage {
    public const UNKNOWN_ERROR_CODE = -150000;

    protected static array $messages = [
        self::UNKNOWN_ERROR_CODE => 'Unknown error code: {code}'
    ];
}