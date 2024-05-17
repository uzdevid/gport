<?php

namespace common\Component\DeviceManager;

use common\Dto\Device;
use common\Exception\BadRequestHttpException;
use common\Exception\Message\BadRequest;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use UnexpectedValueException;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use Yiisoft\Hydrator\Hydrator;

/**
 *
 * @property-read TokenProviderInterface $tokenProvider
 * @property-read void $isGuest
 */
class DeviceManager extends Component {
    private TokenProviderInterface $_tokenProvider;
    public string $secret;
    public string $algo;
    public Device|null $device = null;

    /**
     * @return TokenProviderInterface
     */
    public function getTokenProvider(): TokenProviderInterface {
        return $this->_tokenProvider;
    }

    /**
     * @param TokenProviderInterface|array|string $tokenProvider
     * @return void
     * @throws InvalidConfigException
     */
    public function setTokenProvider(TokenProviderInterface|array|string $tokenProvider): void {
        if (is_string($tokenProvider) && class_exists($tokenProvider)) {
            $tokenProvider = new $tokenProvider;
        }

        if (is_array($tokenProvider)) {
            $object = Yii::createObject($tokenProvider);

            if (!($object instanceof TokenProviderInterface)) {
                throw new InvalidConfigException("tokenProvider must be implement " . TokenProviderInterface::class);
            }

            /** @var TokenProviderInterface $object */
            $tokenProvider = $object;
        }

        $this->_tokenProvider = $tokenProvider;
    }

    /**
     * @throws BadRequestHttpException
     */
    public function init(): void {
        $this->loadDevice();

        parent::init();
    }

    /**
     * @return void
     * @throws BadRequestHttpException
     */
    protected function loadDevice(): void {
        $token = $this->tokenProvider->getToken();

        if (is_null($token)) {
            return;
        }

        try {
            $jwtPayload = JWT::decode($token, new Key($this->secret, $this->algo));
        } catch (SignatureInvalidException|UnexpectedValueException $exception) {
            throw new BadRequestHttpException(BadRequest::INVALID_DEVICE_TOKEN, $exception);
        }

        $this->device = (new Hydrator())->create(Device::class, ArrayHelper::toArray($jwtPayload));
    }

    /**
     * @return bool
     */
    public function getIsGuest(): bool {
        return is_null($this->device);
    }
}