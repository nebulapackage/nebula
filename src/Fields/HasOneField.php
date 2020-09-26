<?php

namespace Larsklopstra\Nebula\Fields;

use Illuminate\Support\Str;
use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Fields\Concerns\DisplaysProperty;
use Larsklopstra\Nebula\Fields\Concerns\HasFields;
use Larsklopstra\Nebula\Fields\Concerns\HasRelation;

class HasOneField extends NebulaField
{
    use HasRelation, DisplaysProperty;
}
