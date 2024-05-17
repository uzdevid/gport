<?php

namespace common\Component\DeviceManager\TokenProvider;

use common\Component\DeviceManager\TokenProviderInterface;
use Yii;

class HeaderTokenProvider implements TokenProviderInterface {
    public const DEVICE_HEADER = 'X-Device-Token';

    /**
     * @return string|null
     */
    public function getToken(): string|null {
        return Yii::$app->request->headers->get(self::DEVICE_HEADER);
    }
}