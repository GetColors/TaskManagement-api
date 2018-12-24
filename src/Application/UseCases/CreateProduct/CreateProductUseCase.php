<?php

namespace Cartago\Application\UseCases\CreateProduct;

use Cartago\Domain\Entities\Product\Product;
use Cartago\Domain\Entities\Product\ProductRepository;
use Cartago\Domain\Entities\Project\ProjectRepository;
use Cartago\Domain\Entities\User\UserRepository;

class CreateProductUseCase
{
    private $userRepository;
    private $projectRepository;
    private $productRepository;

    public function __construct(
        UserRepository $userRepository,
        ProjectRepository $projectRepository,
        ProductRepository $productRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->projectRepository = $projectRepository;
        $this->productRepository = $productRepository;
    }

    public function execute(CreateProductRequest $request)
    {

        $user = $this->userRepository->byIdOrFail($request->userId());
        $project = $this->projectRepository->byIdOrFail($request->projectId());

        $project->userIsOwnerOrFail($user);

        $product = new Product(
            $request->productId(),
            $request->productName(),
            $request->productDescription(),
            $user,
            $project
        );

        $this->productRepository->create($product);
    }
}