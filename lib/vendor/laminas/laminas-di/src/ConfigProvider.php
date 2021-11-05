<?php

/**
 * @see       https://github.com/laminas/laminas-di for the canonical source repository
 * @copyright https://github.com/laminas/laminas-di/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-di/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\Di;

/**
 * Implements the config provider for mezzio
 */
class ConfigProvider
{
    /**
     * Implements the config provider
     *
     * @return array The configuration for mezzio
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencyConfig()
        ];
    }

    /**
     * Returns the dependency (service manager) configuration
     *
     * @return array
     */
    public function getDependencyConfig() : array
    {
        return [
            // Legacy Zend Framework aliases
            'aliases' => [
                \Zend\Di\InjectorInterface::class => InjectorInterface::class,
                \Zend\Di\ConfigInterface::class => ConfigInterface::class,
                \Zend\Di\CodeGenerator\InjectorGenerator::class => CodeGenerator\InjectorGenerator::class,
            ],
            'factories' => [
                InjectorInterface::class => Container\InjectorFactory::class,
                ConfigInterface::class => Container\ConfigFactory::class,
                CodeGenerator\InjectorGenerator::class => Container\GeneratorFactory::class,
            ],
            'abstract_factories' => [
                Container\ServiceManager\AutowireFactory::class
            ]
        ];
    }
}
