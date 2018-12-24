<?php

namespace Cartago\Domain\Entities\User;

class User
{
    protected $id;

    protected $username;

    protected $email;

    public function __construct(UserId $id,Username $username, Email $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
    }

    public function id():UserId
    {
        return $this->id;
    }

    public function username():Username
    {
        return $this->username;
    }

    public function email():Email
    {
        return $this->email;
    }
}