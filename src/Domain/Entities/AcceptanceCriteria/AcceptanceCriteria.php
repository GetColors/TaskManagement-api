<?php

namespace Cartago\Domain\Entities\AcceptanceCriteria;

use Cartago\Domain\Entities\UserStory\UserStoryId;

class AcceptanceCriteria
{
    protected $id;

    protected $description;

    protected $state = AcceptanceCriteriaStates::PENDING;

    protected $userStoryId;

    public function __construct(AcceptanceCriteriaId $id, AcceptanceCriteriaDescription $description, UserStoryId $userStoryId)
    {
        $this->id = $id;
        $this->description = $description;
        $this->userStoryId = $userStoryId;
    }

    public function id():AcceptanceCriteriaId
    {
        return $this->id;
    }

    public function description():AcceptanceCriteriaDescription
    {
        return $this->description;
    }

    public function userStoryId():UserStoryId
    {
        return $this->userStoryId;
    }

    public function accept():void
    {
        $this->state = AcceptanceCriteriaStates::ACCEPTED;
    }

    public function isAccepted():bool
    {
        return $this->state === AcceptanceCriteriaStates::ACCEPTED;
    }

    public function reject():void
    {
        $this->state = AcceptanceCriteriaStates::REJECTED;
    }

    public function isRejected():bool
    {
        return $this->state === AcceptanceCriteriaStates::REJECTED;
    }

    public function isPending():bool
    {
        return $this->state === AcceptanceCriteriaStates::PENDING;
    }
}