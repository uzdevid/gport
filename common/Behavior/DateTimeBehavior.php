<?php

namespace common\Behavior;

use DateTime;
use yii\behaviors\TimestampBehavior;

class DateTimeBehavior extends TimestampBehavior {
    public string $format = 'Y-m-d H:i:s';

    /**
     * @param $event
     *
     * @return array|DateTime|int|mixed
     */
    protected function getValue($event): mixed {
        if ($this->value === null) {
            return date($this->format);
        }

        return parent::getValue($event);
    }
}