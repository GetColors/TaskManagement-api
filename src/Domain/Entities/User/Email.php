<?php

namespace Cartago\Domain\Entities\User;

class Email
{
    protected $email;

    public function __construct(?string $email)
    {
        if (is_null($email)){
            throw new \InvalidArgumentException("Email cannot be null.");
        }
        if (empty($email)){
            throw new \InvalidArgumentException("Email cannot be empty.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new \InvalidArgumentException("Email must be valid, verify the format.");
        }

        $this->email = $email;
    }

    public function get():string
    {
        return $this->email;
    }

    public function __toString()
    {
        return $this->email;
    }
}