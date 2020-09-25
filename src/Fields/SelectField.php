<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;

class SelectField extends NebulaField
{
    protected array $options = [];

    /**
     * Sets the select fields's options properties.
     *
     * @param array $options
     * @return $this
     */
    public function options(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Return the options.
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
