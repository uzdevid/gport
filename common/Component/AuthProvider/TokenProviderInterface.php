<?php

namespace common\Component\AuthProvider;

interface TokenProviderInterface {
    /**
     * @return string
     */
    public function getToken(): string;

}