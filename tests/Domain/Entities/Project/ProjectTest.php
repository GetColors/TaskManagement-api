<?php

namespace Domain\Entities\Project;

use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\User\UserId;
use Cartago\Domain\Entities\Project\Project;
use Cartago\Domain\Entities\Project\ProjectId;
use Cartago\Domain\Entities\Project\ProjectName;
use Cartago\Domain\Entities\Project\ProjectDescription;

class ProjectTest extends TestCase
{

    /**
     * @test
     * @expectedException \Cartago\Domain\Entities\Project\BadPermissionsException
    */
    public function shouldThrowBadPermissionsException()
    {
        $nonOwnerId = new UserId("aaa");

        $project = new Project(
          new ProjectId("xxxx"),
          new ProjectName("name"),
          new ProjectDescription(""),
          new UserId("bbb")
        );

        $project->userIsOwnerOrFail($nonOwnerId);
    }
}