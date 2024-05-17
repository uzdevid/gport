<?php

namespace common\Dto\Jwt;

final class Session {
    public function __construct(
        public readonly string $id,
        public readonly string $signed_by,
        public readonly bool   $is_trusted,
        public readonly int    $lifetime,
        public readonly string $created_time
    ) {
    }
}