<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Fields\Concerns\HasHelperText;
use Larsklopstra\Nebula\Fields\Concerns\HasResource;

class BelongsTo extends NebulaField
{
    use HasHelperText, HasResource;

    public function resolveBelongsTo($item)
    {
        $resource = $this->getResourceInstance();

        return $item
            ->belongsTo($resource->model(), $this->name)
            ->pluck($resource->title())->first();
    }

    public function resolveRelated()
    {
        $resource = $this->getResourceInstance();

        return $resource->model()::pluck('id', $resource->title());
    }
}
