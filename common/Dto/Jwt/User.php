<?php

namespace common\Dto\Jwt;

final class User {
    public function __construct(
        public readonly string|null $photo,
        public readonly string      $f_name,
        public readonly string      $l_name,
        public readonly string|null $m_name,
        public readonly string|null $birthday,
        public readonly string|null $gender,
        public readonly string      $language,
        public readonly string      $created_time
    ) {
    }
}