<?php

namespace Domain\Entities\Product;

use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\Product\ProductName;

class ProductNameTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullNameIsGiven()
    {
        $productName = new ProductName(null);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyNameIsGiven()
    {
        $productName = new ProductName("");
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNameIsTooShort()
    {
        $productName = new ProductName("aaa");
    }
}