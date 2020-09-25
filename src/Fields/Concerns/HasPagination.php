<?php

namespace Larsklopstra\Nebula\Fields\Concerns;

trait HasPagination
{
    protected int $itemsPerPage = 5;

    public function paginate(int $items): self
    {
        $this->itemsPerPage = $items;

        return $this;
    }

    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }
}
