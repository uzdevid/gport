<?php

namespace common\Bootstrap;

use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;

class ClientLanguage implements BootstrapInterface {
    /**
     * @param $app
     *
     * @return void
     */
    public function bootstrap($app): void {
        $app->on(Application::EVENT_BEFORE_REQUEST, function () use ($app) {
            $requestLanguage = $app->request->headers->get('Accept-Language', 'uz-UZ');

            if (strlen($requestLanguage) > 5) {
                $requestLanguage = substr($requestLanguage, 0, 5);
            }

            Yii::$app->language = $requestLanguage;
        });
    }
}