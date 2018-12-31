<?php

namespace Cartago\Application\Services\CreateUserStory;

use Cartago\Domain\Entities\User\UserId;
use Cartago\Domain\Entities\Product\ProductId;
use Cartago\Domain\Entities\Project\ProjectId;
use Cartago\Domain\Entities\UserStory\UserStoryId;
use Cartago\Domain\Entities\UserStory\UserStoryName;
use Cartago\Domain\Entities\UserStory\UserStoryDescription;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteria;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriterias;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteriaId;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteriaDescription;

class CreateUserStoryRequest
{
    private $userStoryId;

    private $userStoryName;

    private $userStoryDescription;

    private $projectId;

    private $productId;

    private $userId;

    private $acceptanceCriterias;

    public function __construct(
        ?string $userStoryId,
        ?string $userStoryName,
        ?string $userStoryDescription,
        ?string $productId,
        ?string $projectId,
        ?string $userId,
        ?array $acceptanceCriterias
    )
    {
        $this->userStoryId = new UserStoryId($userStoryId);
        $this->userStoryName = new UserStoryName($userStoryName);
        $this->userStoryDescription = new UserStoryDescription($userStoryDescription);
        $this->projectId = new ProjectId($projectId);
        $this->productId = new ProductId($productId);
        $this->userId = new UserId($userId);
        $this->acceptanceCriterias = $acceptanceCriterias;
    }

    public function setAcceptanceCriteriasFromArray(array $acceptanceCriteriasArray):void
    {
        $acceptanceCriterias = new AcceptanceCriterias();

        foreach ($acceptanceCriteriasArray as $acceptanceCriteria){
            $acceptanceCriterias->add(new AcceptanceCriteria(
                new AcceptanceCriteriaId($acceptanceCriteria['id']),
                new AcceptanceCriteriaDescription($acceptanceCriteria['description']),
                new UserStoryId($acceptanceCriteria['userStoryId'])
            ));
        }
    }

    public function userStoryId():UserStoryId
    {
        return $this->userStoryId;
    }

    public function userStoryName():UserStoryName
    {
        return $this->userStoryName;
    }

    public function userStoryDescription():UserStoryDescription
    {
        return $this->userStoryDescription;
    }

    public function productId():ProductId
    {
        return $this->productId;
    }

    public function userId():UserId
    {
        return $this->userId;
    }

    public function projectId():ProjectId
    {
        return $this->projectId;
    }

    public function acceptanceCriterias():AcceptanceCriterias
    {
        return $this->acceptanceCriterias();
    }
}