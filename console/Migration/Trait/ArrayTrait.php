<?php

namespace console\Migration\Trait;

use yii\base\NotSupportedException;
use yii\db\ColumnSchemaBuilder;

trait ArrayTrait {
    use DatabaseTrait;

    /**
     * @throws NotSupportedException
     */
    public function integerArray(): ColumnSchemaBuilder {
        return $this->getDb()->getSchema()->createColumnSchemaBuilder('integer[]');
    }

    /**
     * @throws NotSupportedException
     */
    public function stringArray(): ColumnSchemaBuilder {
        return $this->getDb()->getSchema()->createColumnSchemaBuilder('text[]');
    }
}