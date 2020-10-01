<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Fields\Concerns\HasHelperText;
use Larsklopstra\Nebula\Fields\Concerns\HasPlaceholder;

class Input extends NebulaField
{
    use HasPlaceholder, HasHelperText;

    protected string $type = 'text';

    /**
     * Sets the HTML input type.
     *
     * @param mixed $type
     * @return $this
     */
    public function type($type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Returns the HTML input type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
