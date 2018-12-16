<?php

namespace Cartago\Application\Services\CreateUserStory;

use Cartago\Domain\Entities\UserStory\UserStoriesRepository;
use Cartago\Domain\Entities\UserStory\UserStory;

class CreateUserStoryService
{
    private $userStoryRepository;

    public function __construct(UserStoriesRepository $userStoriesRepository)
    {
        $this->userStoryRepository = $userStoriesRepository;
    }

    public function execute(CreateUserStoryRequest $request):void
    {
        $newUserStory = new UserStory($request->uuid(), $request->name());

        $this->userStoryRepository->save($newUserStory);
    }
}