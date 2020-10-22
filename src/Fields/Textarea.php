<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Contracts\ShouldRender;
use Larsklopstra\Nebula\Fields\Concerns\HasHelperText;
use Larsklopstra\Nebula\Fields\Concerns\HasPlaceholder;

class Textarea extends NebulaField implements ShouldRender
{
    use HasPlaceholder, HasHelperText;
}
