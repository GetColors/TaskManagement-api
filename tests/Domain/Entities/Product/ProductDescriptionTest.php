<?php

namespace Domain\Entities\Product;

use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\Product\ProductDescription;

class ProductDescriptionTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullDescriptionIsGiven()
    {
        $productDescription = new ProductDescription(null);
    }

    /**
     * @test
     */
    public function shouldBeAStringWhenIsConcatenated()
    {
        $productDescription = new ProductDescription("description");

        $expectedString = "The product description is description";

        $this->assertTrue($expectedString === "The product description is " . $productDescription);
    }
}