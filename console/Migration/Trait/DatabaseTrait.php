<?php

namespace console\Migration\Trait;

use yii\db\Connection;

trait DatabaseTrait {
    /**
     * @return Connection the database connection to be used for schema building.
     */
    abstract protected function getDb();
}