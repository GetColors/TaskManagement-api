<?php

use Cartago\Domain\Entities\User\User;
use Cartago\Domain\Entities\User\Email;
use Cartago\Domain\Entities\User\UserId;
use Cartago\Domain\Entities\User\Username;

class UserTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
    */
    public function shouldCreateAUserInstance()
    {
        $user = new User(
            new UserId("vav"),
            new Username("username"),
            new Email("email@email.com")
        );
        $this->assertInstanceOf(User::class, $user);
    }
}