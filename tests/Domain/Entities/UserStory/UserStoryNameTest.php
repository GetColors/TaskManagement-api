<?php

namespace Domain\Entities\UserStory;

use Cartago\Domain\Entities\UserStory\UserStoryName;
use PHPUnit\Framework\TestCase;

class UserStoryNameTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullNameIsGiven()
    {
        $userStoryName = new UserStoryName(null);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyNameIsGiven()
    {
        $userStoryName = new UserStoryName("");
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNameIsTooShort()
    {
        $userStoryName = new UserStoryName("aaa");
    }

    /**
     * @test
     */
    public function shouldBeAStringWhenIsConcatenated()
    {
        $userStoryName = new UserStoryName("name");

        $expectedString = "The user story name is name";

        $this->assertTrue($expectedString === "The user story name is " . $userStoryName);
    }
}