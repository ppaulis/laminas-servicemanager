<?php

declare(strict_types=1);

namespace LaminasTest\ServiceManager\TestAsset;

use Laminas\ServiceManager\Factory\FactoryInterface;
use LaminasTest\ServiceManager\TestAsset\ComplexDependencyObject;
use LaminasTest\ServiceManager\TestAsset\SecondComplexDependencyObject;
use LaminasTest\ServiceManager\TestAsset\SimpleDependencyObject;
use Psr\Container\ContainerInterface;

class ComplexDependencyObjectFactory implements FactoryInterface
{
    /**
     * @param string $requestedName
     * @param null|array $options
     * @return ComplexDependencyObject
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new ComplexDependencyObject(
            $container->get(SimpleDependencyObject::class),
            $container->get(SecondComplexDependencyObject::class)
        );
    }
}
