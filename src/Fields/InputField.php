<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Fields\Concerns\HasPlaceholder;

class InputField extends NebulaField
{
    use HasPlaceholder;

    protected string $type = 'text';

    /**
     * Sets the HTML input type.
     *
     * @param mixed $type
     * @return InputField
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

    public function getDetailsComponent()
    {
        return 'nebula::fields.details.text';
    }
}
