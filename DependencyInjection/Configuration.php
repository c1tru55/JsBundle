<?php

namespace ITE\JsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package ITE\JsBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ite_js');

        $this->addAsseticConfiguration($rootNode);
        $this->addAjaxBlockConfiguration($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $rootNode
     */
    protected function addAsseticConfiguration(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('assetic')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('cssrewrite')
                            ->canBeEnabled()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    /**
     * @param ArrayNodeDefinition $rootNode
     */
    protected function addAjaxBlockConfiguration(ArrayNodeDefinition $rootNode)
    {
        $rootNode
          ->children()
                ->arrayNode('ajax_block')
                    ->canBeEnabled()
                    ->children()
                        ->arrayNode('defaults')
                            ->addDefaultsIfNotSet()
                            ->treatNullLike(['show_animation' => 'show', 'show_length' => 0])
                            ->children()
                                ->scalarNode('show_animation')->defaultValue('show')->end()
                                ->scalarNode('show_length')->defaultValue(0)->end()
                            ->end()
                        ->end()
                ->end()
          ->end()
        ;
    }
}
