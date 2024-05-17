<?php

namespace common\Dto\Jwt;

use yii\web\IdentityInterface;

trait IdentityTrait {
    public static function findIdentity($id): IdentityInterface|null {
        return null;
    }

    /**
     * @param $token
     * @param null $type
     *
     * @return IdentityInterface|null
     */
    public static function findIdentityByAccessToken($token, $type = null): IdentityInterface|null {
        return null;
    }

    /**
     * @return string
     */
    public function getId(): string {
        return $this->Identity->id;
    }

    /**
     * @return null
     */
    public function getAuthKey() {
        return null;
    }

    /**
     * @param $authKey
     *
     * @return bool
     */
    public function validateAuthKey($authKey): bool {
        return false;
    }
}