<?php

use Cartago\Domain\Entities\User\Email;

class EmailTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullEmailIsGiven()
    {
        $email = new Email(null);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyEmailIsGiven()
    {
        $email = new Email("");
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenInvalidEmailIsGiven()
    {
        $email = new Email("noemail");
    }

    /**
     * @test
     */
    public function shouldBeAbleToBeAStringWhenIsConcatenated()
    {
        $email = new Email("test@email.com");

        $expectedMessage = "Testing email test@email.com";

        $this->assertTrue($expectedMessage === "Testing email " .$email);
    }
}