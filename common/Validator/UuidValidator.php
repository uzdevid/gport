<?php

namespace common\Validator;

use Ramsey\Uuid\Uuid;
use Yii;
use yii\validators\Validator;

class UuidValidator extends Validator {
    /**
     * @param $value
     *
     * @return array|null
     */
    protected function validateValue($value): array|null {
        if (!Uuid::isValid($value)) {
            return [Yii::t('yii', '{attribute} is invalid.'), []];
        }

        return null;
    }
}