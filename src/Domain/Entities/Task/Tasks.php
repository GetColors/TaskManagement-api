<?php

namespace Cartago\Domain\Entities\Task;

class Tasks implements \IteratorAggregate
{

    protected $tasks = array();

    public function add(Task $task): void
    {
        $this->tasks [] = $task;
    }

    public function byId(TaskId $id): ?Task
    {
        foreach ($this->tasks as $item) {
            if ($item->id()->equalsTo($id)) {
                return $item;
            }
        }
        return null;
    }

    public function size()
    {
        return count($this->tasks);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->tasks);
    }

    public function remove(TaskId $id):void
    {
        foreach ($this->tasks as $key => $task){
            if ($task->id()->equalsTo($id)){
                unset($this->tasks[$key]);
            }
        }
    }
}