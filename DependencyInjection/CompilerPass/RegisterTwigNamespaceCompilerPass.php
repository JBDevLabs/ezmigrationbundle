<?php
/**
 * @copyright Macintoshplus (c) 2022
 * Added by : Macintoshplus at 19/02/2022 17:32
 */

declare(strict_types=1);

namespace Kaliop\eZMigrationBundle\DependencyInjection\CompilerPass;


use Symfony\Component\DependencyInjection\ContainerBuilder;

final class RegisterTwigNamespaceCompilerPass implements \Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
{

    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->hasDefinition('twig.loader.native_filesystem')){
            $bundleDirectory = \dirname(__DIR__,2);
            $twigFilesystemLoaderDefinition = $container->getDefinition('twig.loader.native_filesystem');
            $twigFilesystemLoaderDefinition->addMethodCall('addPath', [$bundleDirectory.'/Resources/views', 'eZMigrationBundle']);
        }
    }
}
