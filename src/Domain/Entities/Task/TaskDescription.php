<?php

namespace Cartago\Domain\Entities\Task;

class TaskDescription
{
    protected $description;

    public function __construct(?string $description)
    {
        $this->description = $description;
    }

    public function get():string
    {
        return $this->description;
    }
}