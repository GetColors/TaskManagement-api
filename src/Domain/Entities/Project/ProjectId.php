<?php

namespace Cartago\Domain\Entities\Project;

class ProjectId
{
    protected $id;

    public function __construct(?string $id)
    {
        $this->setId($id);
    }

    protected function setId(?string $id): void
    {
        if (is_null($id)){
            throw new \InvalidArgumentException("Project id cannot be null.");
        }

        if (empty($id)){
            throw new \InvalidArgumentException("Project id cannot be empty");
        }

        $this->id = $id;
    }

    public function get():string
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }
}