<?php

namespace Cartago\Domain\Entities\Product;

use Cartago\Domain\Entities\Project\ProjectId;
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

    protected $projectId;

    protected $userStories = array();

    public function __construct(
        ProductId $id,
        ProductName $name,
        ProductDescription $description,
        ProjectId $projectId
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->projectId = $projectId;
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

    public function projectId():ProjectId
    {
        return $this->projectId;
    }

    public function addUserStory(
        UserStory $userStory
    )
    {

        $this->userStories [] = $userStory;
    }

    public function userStories()
    {
        return $this->userStories;
    }
}