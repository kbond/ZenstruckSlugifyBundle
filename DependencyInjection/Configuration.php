<?php

namespace Zenstruck\SlugifyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('zenstruck_slugify');

        $rootNode
            ->children()
                ->booleanNode('twig')->defaultTrue()->end()
                ->scalarNode('mode')
                    ->validate()
                        ->ifNotInArray(array('array', 'iconv'))
                        ->thenInvalid('Invalid Slugify mode')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}