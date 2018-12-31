<?php

namespace Domain\Entities\Project;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\Project\ProjectDescription;

class ProjectDescriptionTest extends TestCase
{
    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullDescriptionIsGiven()
    {
        $projectDescription = new ProjectDescription(null);
    }

    /**
     * @test
     */
    public function shouldBeAStringWhenIsConcatenated()
    {
        $projectDescription = new ProjectDescription("description");

        $expectedString = "The project description is description";

        $this->assertTrue($expectedString === "The project description is " . $projectDescription);
    }
}