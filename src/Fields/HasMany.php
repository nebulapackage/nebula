<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Contracts\ShouldRenderTable;
use Larsklopstra\Nebula\Fields\Concerns\HasResource;

class HasMany extends NebulaField implements ShouldRenderTable
{
    use HasResource;

    public function resolveHasMany($item)
    {
        $resource = $this->getResourceInstance();

        return $item
            ->hasMany($resource->model(), $this->name)
            ->paginate();
    }
}
