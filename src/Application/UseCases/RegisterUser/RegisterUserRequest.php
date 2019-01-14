<?php

namespace Cartago\Application\UseCases\RegisterUser;

use Cartago\Domain\Entities\User\Email;
use Cartago\Domain\Entities\User\UserId;
use Cartago\Domain\Entities\User\Username;

final class RegisterUserRequest
{
    private $id;

    private $username;

    private $email;

    public function __construct(?string $id, ?string $username, ?string $email)
    {
        $this->id = new UserId($id);
        $this->username = new Username($username);
        $this->email = new Email($email);
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