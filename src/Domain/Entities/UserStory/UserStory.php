<?php

namespace Cartago\Domain\Entities\UserStory;

use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteria;
use Cartago\Domain\Entities\Product\ProductId;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriterias;

class UserStory
{
    protected $id;

    protected $name;

    protected $description;

    protected $productId;

    protected $acceptanceCriterias;

    public function __construct(
        UserStoryId $userStoryId,
        UserStoryName $userStoryName,
        UserStoryDescription $userStoryDescription,
        ProductId $productId
    )
    {
        $this->id = $userStoryId;
        $this->name = $userStoryName;
        $this->description = $userStoryDescription;
        $this->productId = $productId;
        $this->acceptanceCriterias = new AcceptanceCriterias();
    }

    public function id():UserStoryId
    {
        return $this->id;
    }

    public function name():UserStoryName
    {
        return $this->name;
    }

    public function description():UserStoryDescription
    {
        return $this->description;
    }

    public function productId():ProductId
    {
        return $this->productId;
    }

    public function acceptanceCriterias():AcceptanceCriterias
    {
        return $this->acceptanceCriterias;
    }

    public function addAcceptanceCriteria(AcceptanceCriteria $acceptanceCriteria):void
    {
        $this->acceptanceCriterias->add($acceptanceCriteria);
    }

}