<?php

namespace Domain\Entities\Product;

use Cartago\Domain\Entities\Product\ProductId;
use PHPUnit\Framework\TestCase;

class ProductIdTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullIdIsGiven()
    {
        $productId = new ProductId(null);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyIdIsGiven()
    {
        $productId = new ProductId("");
    }
}