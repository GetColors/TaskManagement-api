<?php

namespace Domain\Entities\AcceptanceCriteria;

use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteriaId;
use PHPUnit\Framework\TestCase;

class AcceptanceCriteriaIdTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullIdIsGiven()
    {
        $acceptanceCriteriaId = new AcceptanceCriteriaId(null);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyIdIsGiven()
    {
        $acceptanceCriteriaId = new AcceptanceCriteriaId("");
    }

    /**
     * @test
     */
    public function shouldGenerateAInstanceOfAcceptanceCriteriaId()
    {
        $acceptanceCriteriaId = new AcceptanceCriteriaId("ascaa");

        $this->assertInstanceOf(AcceptanceCriteriaId::class, $acceptanceCriteriaId);
    }

    /**
     * @test
     */
    public function shouldBeAStringWhenIsConcatenated()
    {
        $acceptanceCriteriaId = new AcceptanceCriteriaId("aaaa");

        $expectedString = "The acceptance criteria id is aaaa";

        $this->assertTrue($expectedString === "The acceptance criteria id is " . $acceptanceCriteriaId);
    }

    /**
     * @test
    */
    public function shouldReturnTrueWhenIsEqualsToAnotherAcceptanceCriteria()
    {
        $acceptanceCriteriaId = new AcceptanceCriteriaId("aaa");
        $anotherAcceptanceCriteriaId = new AcceptanceCriteriaId("aaa");

        $this->assertTrue($acceptanceCriteriaId->equalsTo($anotherAcceptanceCriteriaId));
    }
}