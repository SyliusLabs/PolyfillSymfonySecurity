<?php

declare(strict_types=1);

namespace SyliusLabs\Polyfill\Symfony\Security\Core\User;

use Symfony\Component\Security\Core\User\AdvancedUserInterface as SymfonyAdvancedUserInterface;

if (\interface_exists(SymfonyAdvancedUserInterface::class)) {
    interface AdvancedUserInterface extends SymfonyAdvancedUserInterface
    {
    }
} else {
    /**
     * @link https://github.com/symfony/symfony/blob/v4.4.18/src/Symfony/Component/Security/Core/User/AdvancedUserInterface.php
     */
    interface AdvancedUserInterface extends UserInterface
    {
        /**
         * Checks whether the user's account has expired.
         *
         * Internally, if this method returns false, the authentication system
         * will throw an AccountExpiredException and prevent login.
         *
         * @return bool true if the user's account is non expired, false otherwise
         *
         * @see AccountExpiredException
         */
        public function isAccountNonExpired();

        /**
         * Checks whether the user is locked.
         *
         * Internally, if this method returns false, the authentication system
         * will throw a LockedException and prevent login.
         *
         * @return bool true if the user is not locked, false otherwise
         *
         * @see LockedException
         */
        public function isAccountNonLocked();

        /**
         * Checks whether the user's credentials (password) has expired.
         *
         * Internally, if this method returns false, the authentication system
         * will throw a CredentialsExpiredException and prevent login.
         *
         * @return bool true if the user's credentials are non expired, false otherwise
         *
         * @see CredentialsExpiredException
         */
        public function isCredentialsNonExpired();

        /**
         * Checks whether the user is enabled.
         *
         * Internally, if this method returns false, the authentication system
         * will throw a DisabledException and prevent login.
         *
         * @return bool true if the user is enabled, false otherwise
         *
         * @see DisabledException
         */
        public function isEnabled();
    }
}
