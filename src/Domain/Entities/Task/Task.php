<?php

namespace Cartago\Domain\Entities\Task;

use Cartago\Domain\Entities\UserStory\UserStoryId;

class Task
{
    protected $id;

    protected $description;

    protected $userStoryId;

    protected $state = TaskStates::INCOMPLETE;

    public function __construct(
        TaskId $id,  TaskDescription $description, UserStoryId $userStoryId
    )
    {
        $this->id = $id;
        $this->description = $description;
        $this->userStoryId = $userStoryId;
    }

    public function id():TaskId
    {
        return $this->id;
    }

    public function description():TaskDescription
    {
        return $this->description;
    }

    public function userStoryId():UserStoryId
    {
        return $this->userStoryId;
    }

    public function markAsComplete():void
    {
        $this->state = TaskStates::COMPLETE;
    }

    public function isCompleted():bool
    {
        return $this->state === TaskStates::COMPLETE;
    }

    public function markAsInComplete():void
    {
        $this->state = TaskStates::INCOMPLETE;
    }
}