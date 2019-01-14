<?php

namespace Cartago\Application\UseCases\CreateProject;

use Cartago\Domain\Entities\Project\ProjectDescription;
use Cartago\Domain\Entities\Project\ProjectId;
use Cartago\Domain\Entities\Project\ProjectName;
use Cartago\Domain\Entities\User\User;
use Cartago\Domain\Entities\User\UserId;

class CreateProjectRequest
{
    private $projectId;

    private $projectName;

    private $projectDescription;

    private $userId;

    public function __construct(
        string $projectId,
        string $projectName,
        string $projectDescription,
        string $userId
    )
    {
        $this->projectId = new ProjectId($projectId);
        $this->projectName = new ProjectName($projectName);
        $this->projectDescription = new ProjectDescription($projectDescription);
        $this->userId = new UserId($userId);
    }

    public function projectId():ProjectId
    {
        return $this->projectId;
    }

    public function projectName():ProjectName
    {
        return $this->projectName;
    }

    public function projectDescription():ProjectDescription
    {
        return $this->projectDescription;
    }

    public function userId():UserId
    {
        return $this->userId;
    }
}