<?php

namespace Cartago\Domain\Entities\AcceptanceCriteria;

use Cartago\Domain\Entities\UserStory\UserStoryId;

class AcceptanceCriteria
{
    protected $id;

    protected $description;

    protected $userStoryId;

    protected $isAccepted;

    public function __construct(AcceptanceCriteriaId $id, AcceptantCriteriaDescription $description, UserStoryId $userStoryId)
    {
        $this->id = $id;
        $this->description = $description;
        $this->userStoryId = $userStoryId;
        $this->isAccepted = false;
    }

    public function id():AcceptanceCriteriaId
    {
        return $this->id;
    }

    public function description():AcceptantCriteriaDescription
    {
        return $this->description;
    }

    public function userStoryId():UserStoryId
    {
        return $this->userStoryId;
    }

    public function isAccepted():bool
    {
        return $this->isAccepted;
    }

    public function accept():void
    {
        $this->isAccepted = true;
    }
}