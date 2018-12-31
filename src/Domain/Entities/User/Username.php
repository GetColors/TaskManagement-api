<?php

namespace Cartago\Domain\Entities\User;

class Username
{
    protected $username;

    public function __construct(?string $username)
    {
        if (is_null($username)){
            throw new \InvalidArgumentException("Username cannot be null.");
        }
        if (empty($username)){
            throw new \InvalidArgumentException("Username cannot be empty.");
        }
        if (strlen($username) < 4){
            throw new \InvalidArgumentException("Username must have a minimum of 4 characters.");
        }
        if (strlen($username) > 12){
            throw new \InvalidArgumentException("Username must have a maximum of 12 characters.");
        }

        $this->username = $username;
    }

    public function get():string
    {
        return $this->username;
    }

    public function __toString()
    {
        return $this->username;
    }
}