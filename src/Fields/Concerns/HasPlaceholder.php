<?php

namespace Larsklopstra\Nebula\Fields\Concerns;

trait HasPlaceholder
{
    protected string $placeholder = '';

    /**
     * Sets the placeholder property.
     *
     * @param string $placeholder
     * @return $this
     */
    public function placeholder(string $placeholder): self
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Returns the placeholder.
     *
     * @return string
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }
}
