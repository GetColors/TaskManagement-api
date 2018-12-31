<?php

use Cartago\Domain\Entities\User\UserId;

class UserIdTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @expectedException InvalidArgumentException
    */
    public function shouldThrowInvalidArgumentExceptionWhenNullIdIsGiven()
    {
        $userId = new UserId(null);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyIdIsGiven()
    {
        $userId = new UserId("");
    }
}