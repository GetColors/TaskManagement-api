<?php

namespace Cartago\Application\UseCases\CreateProject;

use Cartago\Domain\Entities\Project\Project;
use Cartago\Domain\Entities\User\UserRepository;
use Cartago\Domain\Entities\Project\ProjectRepository;

class CreateProjectUseCase
{
    private $userRepository;
    private $projectRepository;

    public function __construct(
        UserRepository $userRepository,
        ProjectRepository $projectRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->projectRepository = $projectRepository;
    }

    public function execute(CreateProjectRequest $request)
    {
        $user = $this->userRepository->byIdOrFail($$request->userId());

        $this->projectRepository->create(
            new Project(
                $request->projectId(),
                $request->projectName(),
                $request->projectDescription(),
                $user
            )
        );



    }
}