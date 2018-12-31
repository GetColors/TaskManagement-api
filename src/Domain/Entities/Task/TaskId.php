<?php

namespace Cartago\Domain\Entities\Task;

class TaskId
{
    protected $id;

    public function __construct(?string $id)
    {
        $this->id = $id;
    }

    public function get():string
    {
        return $this->id;
    }

    public function equalsTo(TaskId $anotherTaskId):bool
    {
        return $this->id === $anotherTaskId->get();
    }
}