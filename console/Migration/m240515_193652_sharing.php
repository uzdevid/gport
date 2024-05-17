<?php

use console\Migration\Trait\UuidTypeTrait;
use yii\base\NotSupportedException;
use yii\db\Migration;

/**
 * Class m240515_193652_share
 */
class m240515_193652_sharing extends Migration {
    use UuidTypeTrait;

    private string $tableName = '{{%sharing}}';

    /**
     * {@inheritdoc}
     * @throws NotSupportedException
     */
    public function safeUp(): void {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),

            'user_id' => $this->uuid()->notNull(),

            'key' => $this->char(4)->unique()->notNull(),

            'remote_address' => $this->string(32)->notNull(),
            'local_address' => $this->string(64)->notNull(),

            'connection_id' => $this->integer()->notNull(),

            'active' => $this->integer()->notNull(),
            'is_active' => $this->boolean()->notNull(),

            'created_time' => $this->timestamp()->notNull()
        ]);

        $this->createIndex('idx_sharing_user_id', $this->tableName, 'user_id');
        $this->createIndex('idx_sharing_key', $this->tableName, 'key');
        $this->createIndex('idx_sharing_remote_address', $this->tableName, 'remote_address');
        $this->createIndex('idx_sharing_connection_id', $this->tableName, 'connection_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable($this->tableName);
        return true;
    }
}
