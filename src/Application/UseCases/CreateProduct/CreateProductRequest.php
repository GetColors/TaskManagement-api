<?php

namespace Cartago\Application\UseCases\CreateProduct;

use Cartago\Domain\Entities\Product\ProductDescription;
use Cartago\Domain\Entities\Product\ProductId;
use Cartago\Domain\Entities\Product\ProductName;
use Cartago\Domain\Entities\Project\Project;
use Cartago\Domain\Entities\Project\ProjectId;
use Cartago\Domain\Entities\User\UserId;

class CreateProductRequest
{
    protected $productId;

    protected $productName;

    protected $productDescription;

    protected $projectId;

    public function __construct(
        string $productId,
        string $productName,
        string $productDescription,
        string $projectId
    )
    {
        $this->productId = new ProductId($productId);
        $this->productName = new ProductName($productName);
        $this->productDescription = new ProductDescription($productDescription);
        $this->projectId = new ProjectId($projectId);
    }


    public function productId():ProductId
    {
        return $this->productId;
    }

    public function productName():ProductName
    {
        return $this->productName;
    }

    public function productDescription():ProductDescription
    {
        return $this->productDescription;
    }

    public function projectId():ProjectId
    {
        return $this->projectId;
    }
}