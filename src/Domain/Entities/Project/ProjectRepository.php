<?php

namespace Cartago\Domain\Entities\Project;

interface ProjectRepository
{
    public function create(Project $project):void;

    public function byIdOrFail(ProjectId $id):Project;
}