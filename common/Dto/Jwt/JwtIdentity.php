<?php

namespace common\Dto\Jwt;

use yii\base\Arrayable;
use yii\base\ArrayableTrait;
use yii\web\IdentityInterface;

final class JwtIdentity implements IdentityInterface, Arrayable {
    use ArrayableTrait;
    use IdentityTrait;

    public function __construct(
        public readonly Identity $Identity,
        public readonly User     $User,
        public readonly Session  $Session
    ) {
    }
}