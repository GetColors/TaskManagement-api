<?php

namespace Cartago\Application\Services\CreateTask;

class CreateTaskRequest
{
    private $id;

    private $name;

    private $description;

    private $userStoryId;

    public function __construct(?string $id, ?string $name, ?string $description, ?string $userStoryId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->userStoryId = $userStoryId;
    }

    public function id():?string
    {
        return $this->id;
    }

    public function name():?string
    {
        return $this->name;
    }

    public function description():?string
    {
        return $this->description;
    }

    public function userStoryId():?string
    {
        return $this->userStoryId;
    }
}