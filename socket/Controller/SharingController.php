<?php

namespace socket\Controller;

use common\Model\Sharing;
use Ramsey\Uuid\Uuid;
use UzDevid\WebSocket\Controller;
use UzDevid\WebSocket\Server\Dto\Client;
use Workerman\Timer;
use Yii;
use yii\base\Exception;

class SharingController extends Controller {
    /**
     * @throws Exception
     */
    public function actionShare(Client $client, array $payload): void {
        $sharing = new Sharing();

        $sharing->key = strtolower(Yii::$app->security->generateRandomString(4));
        $sharing->user_id = Uuid::uuid4()->toString();
        $sharing->connection_id = $client->id;
        $sharing->remote_address = sprintf('%s.gport.uzdevid.com', $sharing->key);
        $sharing->local_address = $payload['localAddress'];
        $sharing->active = 0;
        $sharing->is_active = true;

        $sharing->save();

        $client->user->send('SharingResponse', [
            'id' => $sharing->id,
            'key' => $sharing->key,
            'remoteAddress' => "https://" . $sharing->remote_address,
            'localAddress' => $sharing->local_address,
        ]);

        Timer::add(5, static function () use ($client) {
            $client->user->send("LocalClient:is-online", [date('Y-m-d H:i:s')]);
        });
    }
}