<?php

namespace Larsklopstra\Nebula\Fields;

use Illuminate\Support\Str;
use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Fields\Concerns\HasFields;
use Larsklopstra\Nebula\Fields\Concerns\HasPagination;
use Larsklopstra\Nebula\Fields\Concerns\HasRelation;

class HasManyField extends NebulaField
{
    use HasRelation, HasPagination, HasFields;

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
}
