<?php

namespace Larsklopstra\Nebula\Fields\Concerns;

trait HasRelation
{
    protected string $relation = '';

    public function relation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getRelation()
    {
        return $this->relation;
    }
}
