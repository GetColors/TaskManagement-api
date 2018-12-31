<?php

use Cartago\Domain\Entities\User\Username;

class UsernameTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullUsernameIsGiven()
    {
        $username = new Username(null);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyUsernameIsGiven()
    {
        $username = new Username("");
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenTooShortUsernameIsGiven()
    {
        $username = new Username("abc");
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenTooLongUsernameIsGiven()
    {
        $username = new Username("abcdefghijklm");
    }

    /**
     * @test
     */
    public function shouldBeAbleToBeAStringWhenIsConcatenated()
    {
        $username = new Username("testin");
        $expectedString = "The username is testin";

        $this->assertTrue($expectedString === "The username is " . $username);
    }
}