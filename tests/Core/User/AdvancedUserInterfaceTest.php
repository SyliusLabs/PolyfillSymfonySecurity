<?php

declare(strict_types=1);

namespace Tests\SyliusLabs\Polyfill\Symfony\Security\Core\User;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use SyliusLabs\Polyfill\Symfony\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface as SymfonyAdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

final class AdvancedUserInterfaceTest extends TestCase
{
    /** @test */
    public function it_extends_symfonys_advanced_user_interface_if_available(): void
    {
        if (!\interface_exists(SymfonyAdvancedUserInterface::class)) {
            self::markTestSkipped('Symfony AdvancedUserInterface does not exist.');
        }

        Assert::assertContains(SymfonyAdvancedUserInterface::class, \class_implements(AdvancedUserInterface::class));
        Assert::assertContains(UserInterface::class, \class_implements(AdvancedUserInterface::class));
    }

    /** @test */
    public function it_does_not_extend_symfonys_advanced_user_interface_if_not_available(): void
    {
        if (\interface_exists(SymfonyAdvancedUserInterface::class)) {
            self::markTestSkipped('Symfony AdvancedUserInterface exists.');
        }

        Assert::assertNotContains(SymfonyAdvancedUserInterface::class, \class_implements(AdvancedUserInterface::class));
        Assert::assertContains(UserInterface::class, \class_implements(AdvancedUserInterface::class));
    }

    /** @test */
    public function it_contains_expected_methods(): void
    {
        $reflectionClass = new \ReflectionClass(AdvancedUserInterface::class);
        $declaredMethods = array_map(
            static function (\ReflectionMethod $reflectionMethod): string {
                return $reflectionMethod->getName();
            },
            $reflectionClass->getMethods()
        );

        Assert::assertContains('isAccountNonExpired', $declaredMethods);
        Assert::assertContains('isAccountNonLocked', $declaredMethods);
        Assert::assertContains('isCredentialsNonExpired', $declaredMethods);
        Assert::assertContains('isEnabled', $declaredMethods);
        Assert::assertContains('getRoles', $declaredMethods);
        Assert::assertContains('getPassword', $declaredMethods);
        Assert::assertContains('getSalt', $declaredMethods);
        Assert::assertContains('getUsername', $declaredMethods);
        Assert::assertContains('eraseCredentials', $declaredMethods);
    }
}
