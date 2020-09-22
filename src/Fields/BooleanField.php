<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;

class BooleanField extends NebulaField
{
    /**
     * Casts the value to a boolean.
     *
     * @return bool
     */
    public function getValue(): bool
    {
        return $this->value;
    }
}
