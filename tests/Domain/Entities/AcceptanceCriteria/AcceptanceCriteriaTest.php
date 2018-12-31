<?php

namespace Domain\Entities\AcceptanceCriteria;

use PHPUnit\Framework\TestCase;
use Cartago\Domain\Entities\UserStory\UserStoryId;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteria;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteriaId;
use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteriaDescription;

class AcceptanceCriteriaTest extends TestCase
{
    /**
     * @test
    */
    public function shouldReturnTrueWhenIsAccepted()
    {
        $acceptanceCriteria = new AcceptanceCriteria(
            new AcceptanceCriteriaId("aaa"),
            new AcceptanceCriteriaDescription("aaaaaaaa"),
            new UserStoryId("aa")
        );
        $acceptanceCriteria->accept();

        $this->assertTrue($acceptanceCriteria->isAccepted());
    }

    /**
     * @test
     */
    public function shouldReturnTrueWhenIsRejected()
    {
        $acceptanceCriteria = new AcceptanceCriteria(
            new AcceptanceCriteriaId("aaa"),
            new AcceptanceCriteriaDescription("aaaaaaaa"),
            new UserStoryId("aa")
        );
        $acceptanceCriteria->reject();

        $this->assertTrue($acceptanceCriteria->isRejected());
    }

    /**
     * @test
    */
    public function shouldReturnTrueWhenIsPending()
    {
        $acceptanceCriteria = new AcceptanceCriteria(
            new AcceptanceCriteriaId("aaa"),
            new AcceptanceCriteriaDescription("aaaaaaaa"),
            new UserStoryId("aa")
        );

        $this->assertTrue($acceptanceCriteria->isPending());
    }
}