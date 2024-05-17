<?php

namespace common\Component\AuthProvider;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 *
 * @property TokenProviderInterface $tokenProvider
 */
class AuthProvider extends Component {
    private TokenProviderInterface $_tokenProvider;
    public string $secret;
    public string $algo;

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
}