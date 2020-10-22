<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Contracts\Listable;
use Larsklopstra\Nebula\Fields\Concerns\HasHelperText;
use Larsklopstra\Nebula\Fields\Concerns\HasPlaceholder;

class Textarea extends NebulaField implements Listable
{
    use HasPlaceholder, HasHelperText;
}
