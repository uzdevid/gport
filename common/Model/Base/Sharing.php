<?php

namespace common\Model\Base;

use Yii;

/**
 * This is the model class for table "sharing".
 *
 * @property int $id
 * @property string $user_id
 * @property string $key
 * @property string $remote_address
 * @property string $local_address
 * @property int $connection_id
 * @property int $active
 * @property bool $is_active
 * @property string $created_time
 */
class Sharing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sharing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'key', 'remote_address', 'local_address', 'connection_id', 'active', 'is_active', 'created_time'], 'required'],
            [['user_id'], 'string'],
            [['connection_id', 'active'], 'default', 'value' => null],
            [['connection_id', 'active'], 'integer'],
            [['is_active'], 'boolean'],
            [['created_time'], 'safe'],
            [['key'], 'string', 'max' => 4],
            [['remote_address'], 'string', 'max' => 32],
            [['local_address'], 'string', 'max' => 64],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'key' => 'Key',
            'remote_address' => 'Remote Address',
            'local_address' => 'Local Address',
            'connection_id' => 'Connection ID',
            'active' => 'Active',
            'is_active' => 'Is Active',
            'created_time' => 'Created Time',
        ];
    }
}
