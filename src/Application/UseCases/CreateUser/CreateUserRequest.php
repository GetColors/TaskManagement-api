<?php

namespace Cartago\Application\UseCases\CreateUser;

use Cartago\Domain\Entities\User\Email;
use Cartago\Domain\Entities\User\UserId;
use Cartago\Domain\Entities\User\Username;

class CreateUserRequest
{
    private $userId;

    private $username;

    private $email;

    public function __construct(?string $userId, ?string $username, ?string $email)
    {
        $this->userId = new UserId($userId);
        $this->username = new Username($username);
        $this->email = new Email($email);
    }

    public function userId():UserId
    {
        return $this->userId();
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