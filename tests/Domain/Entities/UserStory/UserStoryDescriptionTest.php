<?php

namespace Domain\Entities\UserStory;

use Cartago\Domain\Entities\UserStory\UserStoryDescription;
use PHPUnit\Framework\TestCase;

class UserStoryDescriptionTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullDescriptionIsGiven()
    {
        $userStoryDescription = new UserStoryDescription(null);
    }

    /**
     * @test
     */
    public function shouldBeAStringWhenIsConcatenated()
    {
        $userStoryDescription = new UserStoryDescription("description");

        $expectedString = "The user story description is description";

        $this->assertTrue($expectedString === "The user story description is " . $userStoryDescription);
    }
}