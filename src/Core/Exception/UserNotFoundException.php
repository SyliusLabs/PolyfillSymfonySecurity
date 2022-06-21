<?php

declare(strict_types=1);

namespace SyliusLabs\Polyfill\Symfony\Security\Core\Exception;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException as BaseUserNotFoundException;

if (class_exists(UsernameNotFoundException::class)) {
    final class UserNotFoundException extends UsernameNotFoundException
    {
    }
} else {
    final class UserNotFoundException extends BaseUserNotFoundException
    {
    }
}

