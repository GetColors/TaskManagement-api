<?php

namespace Cartago\Domain\Entities\Product;

interface ProductRepository
{

    public function create(Product $product):void;

    public function byIdOrFail(ProductId $productId):Product;

    public function save(Product $product):void;
}