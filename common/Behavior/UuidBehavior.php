<?php

namespace common\Behavior;

use Ramsey\Uuid\Uuid;
use yii\behaviors\AttributeBehavior;

class UuidBehavior extends AttributeBehavior {
    /**
     * @param $event
     * @return string
     */
    public function getValue($event): string {
        return Uuid::uuid4()->toString();
    }
}