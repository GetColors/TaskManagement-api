<?php

namespace Cartago\Domain\Entities\AcceptanceCriteria;

class AcceptantCriteriaDescription
{
    protected $description;

    public function __construct(string $description)
    {
        $this->setDescription($description);
    }

    protected function setDescription(string $description): void
    {
        if (is_null($description)){
            throw new \InvalidArgumentException("Acceptant criteria description cannot be null.");
        }
        if (empty($description)){
            throw new \InvalidArgumentException("Acceptant criteria description cannot be empty.");
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