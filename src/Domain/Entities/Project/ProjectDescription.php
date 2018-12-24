<?php

namespace Cartago\Domain\Entities\Project;

class ProjectDescription
{
    protected $description;

    public function __construct(string $description)
    {
        $this->setDescription($description);
    }

    protected function setDescription(string $description): void
    {
        if (is_null($description)){
            throw new \InvalidArgumentException("Project description cannot be null.");
        }

        $this->description = $description;
    }

    public function description():string
    {
        return $this->description;
    }
}