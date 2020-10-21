<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Fields\Concerns\HasHelperText;
use Larsklopstra\Nebula\Fields\Concerns\HasResource;

class BelongsTo extends NebulaField
{
    use HasHelperText, HasResource;

    public function resolveBelongsTo($item = null)
    {
        $model = $item ?? request()->item;
        $resource = $this->getResourceInstance();

        return $model
            ->belongsTo($resource->model(), $this->name)
            ->pluck($resource->title())->first();
    }

    public function canBelongTo()
    {
        $resource = $this->getResourceInstance();
        $model = $resource->model();

        return $model::pluck('id', $resource->title());
    }
}
