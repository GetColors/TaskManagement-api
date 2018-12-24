<?php

namespace Cartago\Domain\Entities\Product;

class ProductName
{
    protected $name;

    public function __construct(?string $name)
    {
        $this->setName($name);
    }

    protected function setName(?string $name): void
    {
        if (is_null($name)){
            throw new \InvalidArgumentException("Product name cannot be null.");
        }
        if (empty($name)){
            throw new \InvalidArgumentException("Product name cannot be empty");
        }
        $this->name = $name;
    }

    public function get():string
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}