<?php

namespace Cartago\Domain\Entities\Product;

use Cartago\Domain\Entities\Project\ProjectId;

interface ProductRepository
{

    public function create(Product $product):void;

    public function byIdOrFail(ProductId $productId):Product;

    public function save(Product $product):void;

    public function findByNameInProject(ProductName $productName, ProjectId $projectId):?Product;
}