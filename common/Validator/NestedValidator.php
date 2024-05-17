<?php

namespace common\Validator;

use yii\validators\Validator;

class NestedValidator extends Validator {
    /**
     * @param $model
     * @param $attribute
     *
     * @return void
     */
    public function validateAttribute($model, $attribute): void {
        $value = $model->$attribute;

        $value->validate();

        if ($value->hasErrors()) {
            $model->addError($attribute, $value->firstErrors);
        }
    }
}