<?php

namespace common\Dto\Jwt;

final class Identity {
    public function __construct(
        public readonly string      $id,
        public readonly int $public_id,
        public readonly string|null $username = null,
        public readonly string|null $email = null,
        public readonly string|null $phone = null
    ) {
    }
}