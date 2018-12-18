<?php

namespace Cartago\Infrastructure\Persistence\Repositories\Tasks\Eloquent;

use Cartago\Domain\Entities\Task\Task;
use Cartago\Domain\Entities\Task\TaskRepository;

class EloquentTasksRepository implements TaskRepository
{

    public function save(Task $task): void
    {

    }
}