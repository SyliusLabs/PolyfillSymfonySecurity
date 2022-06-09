<?php

declare(strict_types=1);

namespace SyliusLabs\Polyfill\Symfony\Security\Core\Encoder;

use Symfony\Component\Security\Core\Encoder\EncoderAwareInterface as SymfonyEncoderAwareInterface;

if (\interface_exists(SymfonyEncoderAwareInterface::class)) {
    interface EncoderAwareInterface extends SymfonyEncoderAwareInterface
    {
    }
} else {
    /**
     * @link https://github.com/symfony/symfony/blob/5.4/src/Symfony/Component/Security/Core/Encoder/EncoderAwareInterface.php
     */
    interface EncoderAwareInterface
    {
        /**
         * Gets the name of the encoder used to encode the password.
         *
         * If the method returns null, the standard way to retrieve the encoder
         * will be used instead.
         *
         * @return string|null
         */
        public function getEncoderName();
    }
}
