<?php

namespace common\Component\DeviceManager;

interface TokenProviderInterface {
    /**
     * @return string|null
     */
    public function getToken(): string|null;
}