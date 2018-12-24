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
    protected $userId;

    protected $projectId;

    protected $productId;

    protected $productName;

    protected $productDescription;

    public function __construct(
        string $userId,
        string $projectId,
        string $productId,
        string $productName,
        string $productDescription
    )
    {
        $this->userId = new UserId($userId);
        $this->projectId = new ProjectId($projectId);
        $this->productId = new ProductId($productId);
        $this->productName = new ProductName($productName);
        $this->productDescription = new ProductDescription($productDescription);
    }

    public function userId():UserId
    {
        return $this->userId;
    }

    public function projectId():ProjectId
    {
        return $this->projectId;
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
}