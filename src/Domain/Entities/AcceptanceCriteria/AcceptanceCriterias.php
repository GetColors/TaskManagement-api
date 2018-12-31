<?php

namespace Cartago\Domain\Entities\AcceptanceCriteria;

class AcceptanceCriterias implements \IteratorAggregate
{

    protected $acceptanceCriterias = array();

    public function add(AcceptanceCriteria $acceptantCriteria): void
    {
        $this->acceptanceCriterias [] = $acceptantCriteria;
    }

    public function byId(AcceptanceCriteriaId $id): ?AcceptanceCriteria
    {
        foreach ($this->acceptanceCriterias as $item) {
            if ($item->id()->equalsTo($id)) {
                return $item;
            }
        }

        return null;
    }

    public function size()
    {
        return count($this->acceptanceCriterias);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->acceptanceCriterias);
    }
}