<?php

namespace Cartago\Domain\Entities\UserStory;

use Cartago\Domain\Entities\Task\Task;

class UserStory
{
    protected $id;

    protected $name;

    protected $tasks = array();

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id():string
    {
        return $this->id;
    }

    public function name():string
    {
        return $this->name;
    }

    public function addTask(Task $task):void
    {
        $this->tasks [] = $task;
    }

    public function tasks():?array
    {
        return $this->tasks;
    }
}