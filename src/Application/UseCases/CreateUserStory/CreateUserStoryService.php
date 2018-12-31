<?php

namespace Cartago\Application\Services\CreateUserStory;

use Cartago\Domain\Entities\User\UserRepository;
use Cartago\Domain\Entities\Product\ProductRepository;
use Cartago\Domain\Entities\Project\ProjectRepository;

class CreateUserStoryService
{
    private $productRepository;

    private $projectRepository;

    private $userRepository;

    public function __construct(
        ProductRepository $productRepository,
        ProjectRepository $projectRepository,
        UserRepository $userRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->projectRepository = $projectRepository;
        $this->userRepository = $userRepository;
    }

    public function execute(CreateUserStoryRequest $request):void
    {
        $product = $this->productRepository->byIdOrFail($request->productId());

        $project = $this->projectRepository->byIdOrFail($request->projectId());

        $project->userIsOwnerOrFail($request->userId());

        $product->addUserStory(
            $request->userStoryId(),
            $request->userStoryName(),
            $request->userStoryDescription(),
            $request->acceptanceCriterias()
        );


        $this->productRepository->save($product);
    }
}