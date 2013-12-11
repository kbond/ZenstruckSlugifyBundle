<?php

namespace Zenstruck\SlugifyBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class ZenstruckSlugifyExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $mode = null;
        if (isset($config['mode'])) {
             $mode = $config['mode'];
        }
        $container->setParameter(
                'zenstruck.slugify.mode', $mode
            );

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('slugify.xml');

        if ($config['twig']) {
            $loader->load('twig.xml');
        }
    }
}
