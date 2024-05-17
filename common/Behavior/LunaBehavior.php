<?php

namespace common\Behavior;

use common\Service\LunaGenerator;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\BaseActiveRecord;
use yii\db\Exception;

class LunaBehavior extends AttributeBehavior {
    public string $attribute = 'public_id';

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
     * @return int
     * @throws Exception
     */
    protected function getValue($event): int {
        $nextVal = Yii::$app->db->createCommand("SELECT nextval('{$this->attribute}') as next_id")->queryScalar();
        return LunaGenerator::generate($nextVal);
    }
}