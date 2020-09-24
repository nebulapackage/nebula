<?php

namespace Larsklopstra\Nebula\Fields;

use Illuminate\Support\Str;
use Larsklopstra\Nebula\Contracts\NebulaField;

class BelongsToField extends NebulaField
{
    protected string $displays = 'name';
    protected string $relation;

    public function name(string $name): self
    {
        $this->name = "{$name}_id";

        $this->label = Str::of($name)
            ->replace('_', ' ')
            ->lower()
            ->ucfirst();

        $this->relation = $name;

        return $this;
    }

    public function displays(string $displays): self
    {
        $this->displays = $displays;

        return $this;
    }

    public function relation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getDisplays()
    {
        return $this->displays;
    }

    public function getRelation()
    {
        return $this->relation;
    }
}
