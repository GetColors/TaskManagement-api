<?php

namespace Cartago\Domain\Entities\Project;

use Cartago\Domain\Entities\User\User;

class Project
{
    protected $id;

    protected $name;

    protected $description;

    protected $owner;

    public function __construct(
        ProjectId $id,
        ProjectName $name,
        ProjectDescription $description,
        User $owner
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->owner = $owner;
    }

    public function id():ProjectId
    {
        return $this->id;
    }

    public function name():ProjectName
    {
        return $this->name;
    }

    public function description():ProjectDescription
    {
        return $this->description;
    }

    public function owner():User
    {
        return $this->owner;
    }

    public function userIsOwnerOrFail(User $user)
    {
        if ($this->owner()->id() !== $user->id()){
            throw new BadPermissionsException("The user with id : " . $user->id() . " is not the owner of project " . $this->owner->id());
        }
    }
}