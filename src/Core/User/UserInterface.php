<?php

declare(strict_types=1);

namespace SyliusLabs\Polyfill\Symfony\Security\Core\User;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

// Symfony 5.4
if (\method_exists(SymfonyUserInterface::class, 'getPassword')) {
    interface UserInterface extends SymfonyUserInterface
    {
    }
// Symfony 6
} else {
    /**
     * @link https://github.com/symfony/symfony/blob/6.0/src/Symfony/Component/Security/Core/User/UserInterface.php
     * @link https://github.com/symfony/symfony/blob/6.0/src/Symfony/Component/Security/Core/User/PasswordAuthenticatedUserInterface.php
     */
    interface UserInterface extends SymfonyUserInterface, PasswordAuthenticatedUserInterface
    {
        /**
         * Returns the salt that was originally used to hash the password.
         *
         * This can return null if the password was not hashed using a salt.
         *
         * This method is deprecated since Symfony 5.3, implement it from {@link LegacyPasswordAuthenticatedUserInterface} instead.
         *
         * @return string|null The salt
         */
        public function getSalt();

        /**
         * @return string
         *
         * @deprecated since Symfony 5.3, use getUserIdentifier() instead
         */
        public function getUsername();
    }
}
