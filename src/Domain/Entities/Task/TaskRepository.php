<?php

namespace Cartago\Domain\Entities\Task;

interface TaskRepository
{
    public function save(Task $task):void;
}