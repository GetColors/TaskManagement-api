<?php

namespace Domain\Entities\UserStory;

use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\UserStory\UserStoryId;

class UserStoryIdTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullIdIsGiven()
    {
        $userStoryId = new UserStoryId(null);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyIdIsGiven()
    {
        $userStoryId = new UserStoryId("");
    }

    /**
     * @test
     */
    public function shouldGenerateAInstanceOfUserStoryId()
    {
        $userStoryId = new UserStoryId("ascaa");

        $this->assertInstanceOf(UserStoryId::class, $userStoryId);
    }

    /**
     * @test
     */
    public function shouldBeAStringWhenIsConcatenated()
    {
        $userStoryId = new UserStoryId("aaaa");

        $expectedString = "The user story id is aaaa";

        $this->assertTrue($expectedString === "The user story id is " . $userStoryId);
    }
}