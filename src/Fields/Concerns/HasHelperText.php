<?php

namespace Larsklopstra\Nebula\Fields\Concerns;

trait HasHelperText
{
    protected string $helperText = '';

    /**
     * Sets the helper text property.
     *
     * @param string $helperText
     * @return $this
     */
    public function helperText(string $helperText): self
    {
        $this->helperText = $helperText;

        return $this;
    }

    /**
     * Returns the helper text.
     *
     * @return string
     */
    public function getHelperText(): string
    {
        return $this->helperText;
    }
}
