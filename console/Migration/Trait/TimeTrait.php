<?php

namespace console\Migration\Trait;

use yii\db\ColumnSchemaBuilder;

trait TimeTrait {
    public function integerTime(): ColumnSchemaBuilder {
        return $this->bigInteger();
    }
}