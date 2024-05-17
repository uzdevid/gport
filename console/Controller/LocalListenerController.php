<?php

namespace console\Controller;

use console\Socket\LocalListener;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use yii\console\Controller;

class LocalListenerController extends Controller {
    /**
     * @return void
     */
    public function actionRun(): void {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new LocalListener(),
                )
            ),
            8080
        );

        $server->run();
    }
}