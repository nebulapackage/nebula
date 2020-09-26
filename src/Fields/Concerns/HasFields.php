<?php

namespace Larsklopstra\Nebula\Fields\Concerns;

trait HasFields
{
    protected array $fields;

    /**
     *
     * @param mixed $fields
     * @return self
     */
    public function fields($fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    public function getFields()
    {
        return $this->fields;
    }
}
