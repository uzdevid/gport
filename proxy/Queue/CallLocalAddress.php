<?php

namespace proxy\Queue;

use WebSocket\BadOpcodeException;
use WebSocket\Client;
use yii\queue\JobInterface;

readonly final class CallLocalAddress implements JobInterface {
    /**
     * @param Client $client
     * @param array $payload
     */
    public function __construct(
        private Client $client,
        private array  $payload
    ) {
    }

    /**
     * @param $queue
     * @return void
     * @throws BadOpcodeException
     */
    public function execute($queue): void {
        $this->client->send('local-client:call-address', $this->payload);
    }
}