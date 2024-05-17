<?php

namespace common\Dto;

use yii\base\Arrayable;
use yii\base\ArrayableTrait;

final class Device implements Arrayable {
    use ArrayableTrait;

    public string $id;
    public string $key;
    public string $name;
    public string $os;
    public string $type;
    public string $user_agent;
    public string $ip;
    public string $created_time;
}