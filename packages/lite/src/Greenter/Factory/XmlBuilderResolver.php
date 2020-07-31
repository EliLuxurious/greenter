<?php

declare(strict_types=1);

namespace Greenter\Factory;

use Greenter\Builder\BuilderInterface;

class XmlBuilderResolver
{
    /**
     * @var array
     */
    private $options;

    /**
     * XmlBuilderResolver constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function find(string $docClass): BuilderInterface
    {
        $builder = $this->findBuilderType($docClass);

        return new $builder($this->options);
    }

    private function findBuilderType(string $docClass): string
    {
        $className = substr(strrchr($docClass, '\\'), 1);

        return "Greenter\\Xml\\Builder\\${className}Builder";
    }
}
