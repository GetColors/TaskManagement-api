<?php

namespace Domain\Entities\Project;

use Cartago\Domain\Entities\Project\ProjectId;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ProjectIdTest extends TestCase
{
    /**
     * @test
     * @expectedException InvalidArgumentException
    */
    public function shouldThrowInvalidArgumentExceptionWhenNullIdIsGiven()
    {
        $projectId = new ProjectId(null);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyIdIsGiven()
    {
        $projectId = new ProjectId("");
    }

    /**
     * @test
     */
    public function shouldGenerateAInstanceOfProjectId()
    {
        $projectId = new ProjectId("ascaa");

        $this->assertInstanceOf(ProjectId::class, $projectId);
    }

    /**
     * @test
     */
    public function shouldBeAStringWhenIsConcatenated()
    {
        $projectId= new ProjectId("aaaa");

        $expectedString = "The project id is aaaa";

        $this->assertTrue($expectedString === "The project id is " . $projectId);
    }
}