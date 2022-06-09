<?php

declare(strict_types=1);

namespace Tests\SyliusLabs\Polyfill\Symfony\Security\Core\Encoder;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use SyliusLabs\Polyfill\Symfony\Security\Core\Encoder\EncoderAwareInterface;
use Symfony\Component\Security\Core\Encoder\EncoderAwareInterface as SymfonyEncoderAwareInterface;
use Symfony\Component\Security\Core\User\UserInterface;

final class EncoderAwareInterfaceTest extends TestCase
{
    /** @test */
    public function it_extends_symfonys_encoder_aware_interface_if_available(): void
    {
        if (!\interface_exists(SymfonyEncoderAwareInterface::class)) {
            self::markTestSkipped('Symfony EncoderAwareInterface does not exist.');
        }

        Assert::assertContains(SymfonyEncoderAwareInterface::class, \class_implements(EncoderAwareInterface::class));
    }

    /** @test */
    public function it_does_not_extend_symfonys_encoder_aware_interface_if_not_available(): void
    {
        if (\interface_exists(SymfonyEncoderAwareInterface::class)) {
            self::markTestSkipped('Symfony EncoderAwareInterface exists.');
        }

        Assert::assertNotContains(SymfonyEncoderAwareInterface::class, \class_implements(EncoderAwareInterface::class));
    }

    /** @test */
    public function it_contains_expected_methods(): void
    {
        $reflectionClass = new \ReflectionClass(EncoderAwareInterface::class);
        $declaredMethods = array_map(
            static function (\ReflectionMethod $reflectionMethod): string {
                return $reflectionMethod->getName();
            },
            $reflectionClass->getMethods()
        );

        Assert::assertContains('getEncoderName', $declaredMethods);
    }
}
