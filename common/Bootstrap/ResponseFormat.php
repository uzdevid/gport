<?php

namespace common\Bootstrap;

use yii\base\BootstrapInterface;
use yii\web\Response;

class ResponseFormat implements BootstrapInterface {
    /**
     * @param $app
     *
     * @return void
     */
    public function bootstrap($app): void {
        $app->response->on(Response::EVENT_BEFORE_SEND, function ($event) {
            if ($event->sender->format !== Response::FORMAT_JSON) {
                return;
            }

            $response = $event->sender;

            if (!isset($response->data['success'])) {
                $response->data = [
                    'success' => $response->isSuccessful,
                    'body' => $response->data,
                ];
            }
        });
    }
}