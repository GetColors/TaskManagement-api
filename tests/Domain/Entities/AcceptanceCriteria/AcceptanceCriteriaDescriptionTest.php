<?php

namespace Domain\Entities\AcceptanceCriteria;

use Cartago\Domain\Entities\AcceptanceCriteria\AcceptanceCriteriaDescription;
use PHPUnit\Framework\TestCase;

class AcceptanceCriteriaDescriptionTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenNullDescriptionIsGiven()
    {
        $acceptanceCriteriaDescription = new AcceptanceCriteriaDescription(null);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenEmptyDescriptionIsGiven()
    {
        $acceptanceCriteriaDescription = new AcceptanceCriteriaDescription("");
    }

    /**
     * @test
     */
    public function shouldGenerateAInstanceOfAcceptanceCriteriaDescription()
    {
        $acceptanceCriteriaDescription = new AcceptanceCriteriaDescription("ascaaaaaa");

        $this->assertInstanceOf(AcceptanceCriteriaDescription::class, $acceptanceCriteriaDescription);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowInvalidArgumentExceptionWhenDescriptionIsTooShort()
    {
        $acceptanceCriteriaDescription = new AcceptanceCriteriaDescription("nothing");

    }

    /**
     * @test
     */
    public function shouldBeAStringWhenIsConcatenated()
    {
        $description = "aaaaaaaa";
        $acceptanceCriteriaDescription = new AcceptanceCriteriaDescription($description);

        $expectedString = "The acceptance criteria description is " . $description;

        $this->assertTrue($expectedString === "The acceptance criteria description is " . $acceptanceCriteriaDescription);
    }
}