<?php

namespace Application\UseCases\CreateProject;

use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\Project\Project;
use Cartago\Domain\Entities\Project\ProjectId;
use Cartago\Domain\Entities\Project\ProjectRepository;
use Cartago\Domain\Entities\User\UserDoesNotExistException;
use Cartago\Domain\Entities\Project\ProjectIdAlreadyExistException;
use Cartago\Application\UseCases\CreateProject\CreateProjectUseCase;
use Cartago\Application\UseCases\CreateProject\CreateProjectRequest;
use Cartago\Domain\Entities\Project\ProjectNameAlreadyExistException;

class CreateProjectUseCaseTest extends TestCase
{
    /**
     *@test
     * @expectedException \Cartago\Domain\Entities\Project\ProjectIdAlreadyExistException
     */
    public function shouldFailWhenProjectIdIsAlreadyInUse()
    {
        $request = new CreateProjectRequest(
            'aaa',
            'projectA',
            'projectDescription',
            'bbb'
        );
        $service = new CreateProjectUseCase(
            new ProjectRepositoryStub()
        );
        $service->execute($request);
    }

    /**
     *@test
     * @expectedException \Cartago\Domain\Entities\Project\ProjectNameAlreadyExistException
     */
    public function shouldFailWhenProjectNameIsAlreadyInUse()
    {
        $request = new CreateProjectRequest(
            'bbb',
            'projectA',
            'projectDescription',
            'aaa'
        );
        $service = new CreateProjectUseCase(
            new ProjectRepositoryStub()
        );
        $service->execute($request);
    }

    /**
     *@test
     * @expectedException \Cartago\Domain\Entities\User\UserDoesNotExistException
     */
    public function shouldFailWhenOwnerDoesNotExist()
    {
        $request = new CreateProjectRequest(
            'bbb',
            'projectB',
            'projectDescription',
            'bbb'
        );
        $service = new CreateProjectUseCase(
            new ProjectRepositoryStub()
        );
        $service->execute($request);
    }
}

class ProjectRepositoryStub implements ProjectRepository
{
    public function create(Project $project): void
    {
        $idInUse = "aaa";
        $nameInUse = "projectA";
        $ownerId = "aaa";

        if ($idInUse === $project->id()->get()){
            throw new ProjectIdAlreadyExistException("Project id already in use.");
        }

        if ($nameInUse === $project->name()->get()){
            throw new ProjectNameAlreadyExistException("Project name already in use.");
        }

        if ($ownerId !== $project->ownerId()->get()){
            throw new UserDoesNotExistException("User id does not exists.");
        }
    }

    public function byIdOrFail(ProjectId $id): Project
    {
        // TODO: Implement byIdOrFail() method.
    }
}