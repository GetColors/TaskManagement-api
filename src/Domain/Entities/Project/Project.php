<?php

namespace Cartago\Domain\Entities\Project;

use Cartago\Domain\Entities\User\UserId;

class Project
{
    protected $id;

    protected $name;

    protected $description;

    protected $ownerId;

    public function __construct(
        ProjectId $id,
        ProjectName $name,
        ProjectDescription $description,
        UserId $ownerId
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->ownerId = $ownerId;
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

    public function ownerId():UserId
    {
        return $this->ownerId;
    }

    public function userIsOwnerOrFail(UserId $userId)
    {
        if ($this->ownerId->get()!== $userId->get()){
            throw new BadPermissionsException("The user with id : " . $userId->get() . " is not the owner of project " . $this->id->get());
        }
    }
}