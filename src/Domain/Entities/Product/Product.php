<?php

namespace Cartago\Domain\Entities\Product;

use Cartago\Domain\Entities\User\User;
use Cartago\Domain\Entities\Project\Project;
use Cartago\Domain\Entities\UserStory\UserStory;
use Cartago\Domain\Entities\UserStory\UserStoryId;
use Cartago\Domain\Entities\UserStory\UserStoryName;
use Cartago\Domain\Entities\UserStory\UserStoryDescription;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriterias;

class Product
{
    protected $id;

    protected $name;

    protected $description;

    protected $owner;

    protected $project;

    protected $userStories = array();

    public function __construct(
        ProductId $id,
        ProductName $name,
        ProductDescription $description,
        User $owner,
        Project $project
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->owner = $owner;
        $this->project = $project;
    }

    public function id():ProductId
    {
        return $this->id;
    }

    public function name():ProductName
    {
        return $this->name;
    }

    public function description():ProductDescription
    {
        return $this->description;
    }

    public function owner():User
    {
        return $this->owner;
    }

    public function project():Project
    {
        return $this->project;
    }

    public function addUserStory(
        UserStoryId $userStoryId,
        UserStoryName $userStoryName,
        UserStoryDescription $userStoryDescription,
        AcceptanceCriterias $acceptantCriterias
    )
    {
        $newUserStory = new UserStory(
            $userStoryId,
            $userStoryName,
            $userStoryDescription,
            $this->id()
        );

        foreach ($acceptantCriterias as $acceptantCriteria){
            $newUserStory->addAcceptanceCriteria($acceptantCriteria);
        }

        $this->userStories [] = $newUserStory;
    }
}