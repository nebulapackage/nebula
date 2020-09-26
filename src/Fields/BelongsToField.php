<?php

namespace Larsklopstra\Nebula\Fields;

use Illuminate\Support\Str;
use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Fields\Concerns\DisplaysProperty;
use Larsklopstra\Nebula\Fields\Concerns\HasRelation;

class BelongsToField extends NebulaField
{
    use HasRelation, DisplaysProperty;

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
