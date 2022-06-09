<?php

declare(strict_types=1);

namespace SyliusLabs\Polyfill\Symfony\Security\Core\User;

use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

if (\method_exists(SymfonyUserInterface::class, 'getPassword')) {
    interface UserInterface extends SymfonyUserInterface
    {
    }
} else {
    /**
     * @link https://github.com/symfony/symfony/blob/5.3/src/Symfony/Component/Security/Core/User/UserInterface.php
     */
    interface UserInterface extends SymfonyUserInterface
    {
        /**
         * Returns the password used to authenticate the user.
         *
         * This should be the hashed password. On authentication, a plain-text
         * password will be hashed, and then compared to this value.
         *
         * This method is deprecated since Symfony 5.3, implement it from {@link PasswordAuthenticatedUserInterface} instead.
         *
         * @return string|null The hashed password if any
         */
        public function getPassword();

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
