<?php

namespace Application\UseCases\CreateProduct;

use Application\UseCases\CreateProject\ProjectRepositoryStub;
use Cartago\Domain\Entities\Product\ProductDescription;
use Cartago\Domain\Entities\Product\ProductName;
use Cartago\Domain\Entities\Product\ProductNameAlreadyExistException;
use Cartago\Domain\Entities\Project\Project;
use Cartago\Domain\Entities\Project\ProjectDescription;
use Cartago\Domain\Entities\Project\ProjectId;
use Cartago\Domain\Entities\Project\ProjectName;
use Cartago\Domain\Entities\User\UserId;
use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\Product\Product;
use Cartago\Domain\Entities\Product\ProductId;
use Cartago\Domain\Entities\Product\ProductRepository;
use Cartago\Domain\Entities\Product\ProductIdAlreadyExistException;
use Cartago\Application\UseCases\CreateProduct\CreateProductRequest;
use Cartago\Application\UseCases\CreateProduct\CreateProductUseCase;

class CreateProductUseCaseTest extends TestCase
{
    /**
     * @test
     * @expectedException \Cartago\Domain\Entities\Product\ProductIdAlreadyExistException
    */
    public function shouldFailWhenProductIdIsAlreadyInUse()
    {
        $request = new CreateProductRequest(
            'aaa',
            'productA',
            'productDescription',
            'aaa'
        );
        $service = new CreateProductUseCase(
            new ProductRepositoryStub()
        );

        $service->execute($request);
    }

    /**
     * @test
     * @expectedException \Cartago\Domain\Entities\Product\ProductNameAlreadyExistException
     */
    public function shouldFailWhenProductNameIsAlreadyInUseInProject()
    {
        $request = new CreateProductRequest(
            'aaa',
            'productB',
            'productDescription',
            'aaa'
        );
        $service = new CreateProductUseCase(
            new ProductRepositoryStub()
        );

        $service->execute($request);
    }
}

class ProductRepositoryStub implements ProductRepository
{

    public function create(Product $product): void
    {
        $idInUse = "aaa";

        if ($idInUse === $product->id()->get()){
            throw new ProductIdAlreadyExistException("Product id already exist.");
        }
    }

    public function byIdOrFail(ProductId $productId): Product
    {
        // TODO: Implement byIdOrFail() method.
    }

    public function save(Product $product): void
    {
        // TODO: Implement save() method.
    }

    public function findByNameInProject(ProductName $productName, ProjectId $projectId): ?Product
    {
        $product = new Product(
            new ProductId("aaa"),
            new ProductName("productB"),
            new ProductDescription("description"),
            new ProjectId("aaa")
        );

        if ($product->projectId()->equalsTo($projectId) && $product->name()->equalsTo($productName)){
            return $product;
        }

        return null;
    }
}