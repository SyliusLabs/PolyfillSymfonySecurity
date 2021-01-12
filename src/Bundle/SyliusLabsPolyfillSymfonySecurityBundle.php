<?php

declare(strict_types=1);

namespace SyliusLabs\Polyfill\Symfony\Security\Bundle;

use SyliusLabs\Polyfill\Symfony\Security\Bundle\DependencyInjection\Compiler\UserCheckerDecoratorPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class SyliusLabsPolyfillSymfonySecurityBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new UserCheckerDecoratorPass());
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return null;
    }
}
