<?php

namespace socket\Bootstrap;

use common\Model\Sharing;
use UzDevid\WebSocket\Server\Event\CloseConnection;
use UzDevid\WebSocket\Server\Event\NewConnection;
use yii\base\BootstrapInterface;
use yii\helpers\Console;

class EventHandler implements BootstrapInterface {
    /**
     * @param $app
     *
     * @return void
     */
    public function bootstrap($app): void {
        $app->on(NewConnection::class, function (NewConnection $event) {
            Console::stdout("New Connection {$event->client->id}\r\n");
        });

        $app->on(CloseConnection::class, function (CloseConnection $event) {
            Console::stdout("Close Connection {$event->client->id}\r\n");

            $sharing = Sharing::find()->where(['connection_id' => $event->client->id])->one();

            if (is_null($sharing)) {
                return;
            }

            $sharing->updateAttributes(['is_active' => false, 'active' => time() - strtotime($sharing->created_time)]);
        });
    }
}