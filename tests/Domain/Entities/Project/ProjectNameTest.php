<?php

namespace Domain\Entities\Project;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\Project\ProjectName;

class ProjectNameTest extends TestCase
{
    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullNameIsGiven()
    {
        $projectName = new ProjectName(null);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyNameIsGiven()
    {
        $projectName = new ProjectName("");
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNameIsTooShort()
    {
        $projectName = new ProjectName("aaa");
    }

    /**
     * @test
     */
    public function shouldBeAStringWhenIsConcatenated()
    {
        $projectName = new ProjectName("name");

        $expectedString = "The project name is name";

        $this->assertTrue($expectedString === "The project name is " . $projectName);
    }
}