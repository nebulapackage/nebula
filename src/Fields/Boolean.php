<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Contracts\ShouldRender;

class Boolean extends NebulaField implements ShouldRender
{
    protected string $true = 'True';
    protected string $false = 'False';

    /**
     * Set the true label.
     *
     * @param string $label
     * @return $this
     */
    public function true(string $label): self
    {
        $this->true = $label;

        return $this;
    }

    /**
     * Set the false label.
     *
     * @param string $label
     * @return $this
     */
    public function false(string $label): self
    {
        $this->false = $label;

        return $this;
    }

    public function getTrue()
    {
        return $this->true;
    }

    public function getFalse()
    {
        return $this->false;
    }
}
