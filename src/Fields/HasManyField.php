<?php

namespace Larsklopstra\Nebula\Fields;

use Illuminate\Support\Str;
use Larsklopstra\Nebula\Contracts\NebulaField;

class HasManyField extends NebulaField
{
    protected string $relation;
    protected array $fields;

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

    public function relation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getRelation()
    {
        return $this->relation;
    }

    public function fields($fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    public function getFields()
    {
        return $this->fields;
    }
}
