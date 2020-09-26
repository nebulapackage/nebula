<?php

namespace Larsklopstra\Nebula\Fields\Concerns;

trait DisplaysProperty
{
    protected string $displays = 'name';

    public function displays(string $displays): self
    {
        $this->displays = $displays;

        return $this;
    }

    public function getDisplays()
    {
        return $this->displays;
    }
}
