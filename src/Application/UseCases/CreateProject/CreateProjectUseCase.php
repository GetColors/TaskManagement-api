<?php

namespace Cartago\Application\UseCases\CreateProject;

use Cartago\Domain\Entities\Project\Project;
use Cartago\Domain\Entities\User\UserRepository;
use Cartago\Domain\Entities\Project\ProjectRepository;

class CreateProjectUseCase
{
    private $projectRepository;

    public function __construct(
        ProjectRepository $projectRepository
    )
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute(CreateProjectRequest $request)
    {
        $this->projectRepository->create(
            new Project(
                $request->projectId(),
                $request->projectName(),
                $request->projectDescription(),
                $request->userId()
            )
        );



    }
}