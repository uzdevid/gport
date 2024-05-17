<?php

namespace console\Migration\Trait;

use yii\base\NotSupportedException;
use yii\db\ColumnSchemaBuilder;

trait IPTrait {
    use DatabaseTrait;

    /**
     * Creates a inet column.
     *
     * @return ColumnSchemaBuilder the column instance which can be further customized.
     * @throws NotSupportedException
     */
    public function inet(): ColumnSchemaBuilder {
        return $this->getDb()->getSchema()->createColumnSchemaBuilder('inet');
    }
}