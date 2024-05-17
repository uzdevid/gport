<?php

namespace socket\Controller;

use UzDevid\WebSocket\Server\Dto\Client;
use Yii;
use yii\web\Controller;

class AppController extends Controller {
    /**
     * @param Client $client
     * @param array $payload
     * @return void
     */
    public function actionCall(Client $client, array $payload): void {
        foreach (Yii::$app->clients as $conn) {
            if ($conn->id !== $client->id) {
                $conn->user->send('app:call', $payload);
            }
        }
    }

    /**
     * @param Client $client
     * @param array $payload
     * @return void
     */
    public function actionLocalContent(Client $client, array $payload): void {
        foreach (Yii::$app->clients as $conn) {
            if ($conn->id !== $client->id) {
                $conn->user->send('app:call', $payload);
            }
        }
    }
}