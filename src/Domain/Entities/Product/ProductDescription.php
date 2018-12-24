<?php

namespace Cartago\Domain\Entities\Product;

class ProductDescription
{
    protected $description;

    public function __construct(string $description)
    {
        $this->setDescription($description);
    }

    protected function setDescription(string $description): void
    {
        if (is_null($description)){
            throw new \InvalidArgumentException("Product description cannot be null.");
        }

        $this->description = $description;
    }

    public function get():string
    {
        return $this->description;
    }

    public function __toString()
    {
        return $this->description;
    }
}