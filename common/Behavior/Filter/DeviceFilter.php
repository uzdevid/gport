<?php

namespace common\Behavior\Filter;

use common\Exception\BadRequestHttpException;
use common\Exception\Message\BadRequest;
use Yii;
use yii\base\ActionEvent;
use yii\base\Behavior;
use yii\base\Controller;

class DeviceFilter extends Behavior {
    public array $actions = [];

    /**
     * Declares event handlers for the [[owner]]'s events.
     *
     * @return array events (array keys) and the corresponding event handler methods (array values).
     */
    public function events(): array {
        return [Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    /**
     * @throws BadRequestHttpException
     */
    public function beforeAction(ActionEvent $event): bool {
        $action = $event->action->id;

        if (!in_array($action, $this->actions, true)) {
            return true;
        }

        if (Yii::$app->deviceManager->isGuest) {
            throw new BadRequestHttpException(BadRequest::MISSING_DEVICE_TOKEN);
        }

        return true;
    }
}