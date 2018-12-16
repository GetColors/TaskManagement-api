<?php

namespace Cartago\Domain\Entities\UserStory;

class UserStory
{
    protected $uuid;

    protected $name;

    public function __construct(string $uuid, string $name)
    {
        $this->uuid = $uuid;
        $this->name = $name;
    }

    public function uuid():string
    {
        return $this->uuid;
    }

    public function name():string
    {
        return $this->name;
    }
}