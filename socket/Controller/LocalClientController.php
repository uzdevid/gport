<?php

namespace socket\Controller;

use UzDevid\WebSocket\Controller;
use UzDevid\WebSocket\Server\Dto\Client;
use Yii;
use yii\web\NotFoundHttpException;

class LocalClientController extends Controller {
    /**
     * @param Client $client
     * @param array $payload
     * @return void
     */
    public function actionCallAddress(Client $client, array $payload): void {
        try {
            $localClient = Yii::$app->clients->get($payload['connectionId']);
        } catch (NotFoundHttpException $e) {
            return;
        }

        $payload['connectionId'] = $client->id;

        $localClient->user->send('CallLocalAddress', $payload);
    }
}