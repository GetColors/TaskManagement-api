<?php

namespace Cartago\Domain\Entities\AcceptanceCriteria;

class AcceptanceCriteriaDescription
{
    protected $description;

    public function __construct(?string $description)
    {
        $this->setDescription($description);
    }

    protected function setDescription(?string $description): void
    {
        if (is_null($description)){
            throw new \InvalidArgumentException("Acceptance criteria description cannot be null.");
        }
        if (empty($description)){
            throw new \InvalidArgumentException("Acceptance criteria description cannot be empty.");
        }
        if (strlen($description) < 8 ){
            throw new \InvalidArgumentException("Acceptance criteria description must have a minimum of 8 characters.");
        }
        $this->description = $description;
    }

    public function get():string
    {
        return $this->description;
    }

    public function __toString()
    {
        return $this->description;
    }
}