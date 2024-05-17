<?php

namespace common\Model;

use common\Behavior\DateTimeBehavior;

class Sharing extends Base\Sharing {
    /**
     * {@inheritdoc}
     */
    public function rules(): array {
        return [
            [['user_id', 'key', 'remote_address', 'local_address', 'connection_id', 'active', 'is_active'], 'required'],
            [['user_id'], 'string'],
            [['connection_id', 'active'], 'integer'],
            [['is_active'], 'boolean'],
            [['created_time'], 'safe'],
            [['key'], 'string', 'max' => 4],
            [['remote_address', 'local_address'], 'string', 'max' => 32],
            [['key'], 'unique'],
        ];
    }

    /**
     * @return array
     */
    public function behaviors(): array {
        $behaviors = parent::behaviors();

        $behaviors['DateTimeBehavior'] = [
            'class' => DateTimeBehavior::class,
            'attributes' => [
                self::EVENT_BEFORE_INSERT => ['created_time'],
            ]
        ];

        return $behaviors;
    }
}