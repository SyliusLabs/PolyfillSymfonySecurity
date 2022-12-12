<?php

declare(strict_types=1);

namespace SyliusLabs\Polyfill\Symfony\Security\Core\User;

use Symfony\Component\Security\Core\User\LegacyPasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

// Symfony 5.4
if (\method_exists(SymfonyUserInterface::class, 'getPassword')) {
    interface UserInterface extends SymfonyUserInterface
    {
    }
// Symfony 6
} else {
    /**
     * @link https://github.com/symfony/symfony/blob/6.0/src/Symfony/Component/Security/Core/User/LegacyPasswordAuthenticatedUserInterface.php
     * @link https://github.com/symfony/symfony/blob/6.0/src/Symfony/Component/Security/Core/User/UserInterface.php
     */
    interface UserInterface extends LegacyPasswordAuthenticatedUserInterface, SymfonyUserInterface
    {
        /**
         * @return string
         *
         * @deprecated since Symfony 5.3, use getUserIdentifier() instead
         */
        public function getUsername();
    }
}
