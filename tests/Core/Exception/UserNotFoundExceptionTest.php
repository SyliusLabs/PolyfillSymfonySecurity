<?php

declare(strict_types=1);

namespace Tests\SyliusLabs\Polyfill\Symfony\Security\Core\User;

use PHPUnit\Framework\TestCase;
use SyliusLabs\Polyfill\Symfony\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException as SymfonyUserNotFoundException;

final class UserNotFoundExceptionTest extends TestCase
{
    private UserNotFoundException $userNotFoundException;

    protected function setUp(): void
    {
        $this->userNotFoundException = new UserNotFoundException();
    }

    /** @test */
    public function it_extends_symfony_user_not_exception_if_available(): void
    {
        if (class_exists(UsernameNotFoundException::class)) {
            $this->markTestSkipped('Symfony UsernameNotFoundException exists.');
        }

        $this->assertInstanceOf(SymfonyUserNotFoundException::class, $this->userNotFoundException);
    }

    /** @test */
    public function it_extends_symfony_username_not_exception_if_username_not_found_exception_is_not_available(): void
    {
        if (!class_exists(UsernameNotFoundException::class)) {
            $this->markTestSkipped('Symfony UsernameNotFoundException does not exist.');
        }

        $this->assertInstanceOf(UsernameNotFoundException::class, $this->userNotFoundException);
    }
}
