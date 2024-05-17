<?php

namespace socket\Controller;

use UzDevid\WebSocket\Controller;
use UzDevid\WebSocket\Server\Dto\Client;
use Yii;
use yii\web\NotFoundHttpException;

class RemoteClientController extends Controller {
    /**
     * @param array $payload
     * @return void
     */
    public function actionResponse(array $payload): void {
        try {
            $remoteClient = Yii::$app->clients->get($payload['connectionId']);
        } catch (NotFoundHttpException $e) {
            return;
        }

        $remoteClient->user->send('remote-client:response', $payload);
    }
}