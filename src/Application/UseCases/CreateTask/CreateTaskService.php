<?php

namespace Cartago\Application\Services\CreateTask;

use Cartago\Domain\Entities\Task\Task;
use Cartago\Domain\Entities\UserStory\UserStoriesRepository;

class CreateTaskService
{
    private $userStoryRepository;

    public function __construct(UserStoriesRepository $userStoriesRepository)
    {
        $this->userStoryRepository = $userStoriesRepository;
    }

    public function execute(CreateTaskRequest $request):void
    {
        $userStory = $this->userStoryRepository->byId($request->userStoryId());

        $userStory->addTask(new Task(
            $request->id(),
            $request->name(),
            $request->description(),
            $request->userStoryId()
        ));

        $this->userStoryRepository->save($userStory);
    }
}