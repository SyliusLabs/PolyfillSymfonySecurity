<?php

declare(strict_types=1);

namespace SyliusLabs\Polyfill\Symfony\Security\Bundle\DependencyInjection\Compiler;

use SyliusLabs\Polyfill\Symfony\Security\Core\User\UserChecker;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

final class UserCheckerDecoratorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has('security.user_checker')) {
            return;
        }

        $definition = new Definition(UserChecker::class);
        $definition->setDecoratedService('security.user_checker');
        $definition->addArgument(new Reference(UserChecker::class . '.inner'));

        $container->setDefinition(UserChecker::class, $definition);
    }
}
