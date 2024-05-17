<?php

namespace common\Exception\Handler;

use common\Exception\UnprocessableEntityHttpException;
use Yii;
use yii\web\ErrorHandler;

class ExceptionHandler extends ErrorHandler {
    /**
     * @param $exception
     *
     * @return void
     */
    public function renderException($exception): void {
        $response = Yii::$app->response;
        $response->statusCode = $exception->statusCode;

        if (!($exception instanceof UnprocessableEntityHttpException)) {
            parent::renderException($exception);
            return;
        }

        $response->data = [
            'name' => $exception->getName(),
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'errors' => $exception->errors,
            'status' => $exception->statusCode,
            'type' => UnprocessableEntityHttpException::class,
        ];

        $response->send();
    }
}