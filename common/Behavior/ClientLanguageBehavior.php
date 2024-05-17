<?php

namespace common\Behavior;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\BaseActiveRecord;

class ClientLanguageBehavior extends AttributeBehavior {
    public string $attribute = 'language';

    /**
     * @return void
     */
    public function init(): void {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => [$this->attribute],
            ];
        }
    }

    /**
     * @param $event
     *
     * @return string
     */
    protected function getValue($event): string {
        return Yii::$app->language;
    }
}