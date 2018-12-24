<?php

namespace Cartago\Domain\Entities\UserStory;

class UserStoryDescription
{
    protected $description;

    public function __construct(?string $description)
    {
        $this->setDescription($description);
    }

    protected function setDescription(?string $description): void
    {
        if (is_null($description)){
            throw new \InvalidArgumentException("User story description cannot be null.");
        }
        $this->description = $description;
    }

    public function get():string
    {
        return $this->description;
    }

    public function __toString()
    {
        return $this->get();
    }
}