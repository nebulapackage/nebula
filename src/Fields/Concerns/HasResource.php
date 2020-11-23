<?php

namespace Larsklopstra\Nebula\Fields\Concerns;

trait HasResource
{
    protected $resource;

    public function resource($resource): self
    {
        $this->resource = $resource;

        return $this;
    }

    public function getResourceInstance()
    {
        return (new $this->resource);
    }
}
