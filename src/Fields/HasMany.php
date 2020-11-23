<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Fields\Concerns\HasResource;

class HasMany extends NebulaField
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
