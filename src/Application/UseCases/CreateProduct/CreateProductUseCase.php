<?php

namespace Cartago\Application\UseCases\CreateProduct;

use Cartago\Domain\Entities\Product\Product;
use Cartago\Domain\Entities\Product\ProductNameAlreadyExistException;
use Cartago\Domain\Entities\Product\ProductRepository;
use Cartago\Domain\Entities\Project\ProjectRepository;
use Cartago\Domain\Entities\User\UserRepository;

final class CreateProductUseCase
{
    private $productRepository;

    public function __construct(
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function execute(CreateProductRequest $request)
    {
        $foundedProduct = $this->productRepository->findByNameInProject($request->productName(), $request->projectId());

        if (!is_null($foundedProduct)){
            throw new ProductNameAlreadyExistException("Product name is already in use in project.");
        }

        $product = new Product(
            $request->productId(),
            $request->productName(),
            $request->productDescription(),
            $request->projectId()
        );

        $this->productRepository->create($product);
    }
}