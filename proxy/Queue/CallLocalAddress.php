<?php

namespace proxy\Queue;

use UzDevid\WebSocket\Client\WebSocketClient;
use yii\queue\JobInterface;

readonly final class CallLocalAddress implements JobInterface {
    /**
     * @param WebSocketClient $client
     * @param array $payload
     */
    public function __construct(
        private WebSocketClient $client,
        private array  $payload
    ) {
    }

    /**
     * @param $queue
     * @return void
     */
    public function execute($queue): void {
        $this->client->send('local-client:call-address', $this->payload);
    }
}