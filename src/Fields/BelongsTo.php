<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Contracts\Listable;
use Larsklopstra\Nebula\Fields\Concerns\HasHelperText;
use Larsklopstra\Nebula\Fields\Concerns\HasResource;

class BelongsTo extends NebulaField implements Listable
{
    use HasHelperText, HasResource;

    public function resolveBelongsTo($item = null)
    {
        $model = $item ?? request()->item;
        $resource = $this->getResourceInstance();

        return $model
            ->belongsTo($resource->model(), $this->name)
            ->first()
            ->{$resource->title()};
    }

    public function canBelongTo()
    {
        $resource = $this->getResourceInstance();
        $model = $resource->model();

        return $model::get()->pluck($resource->id(), $resource->title());
    }
}
