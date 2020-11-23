<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Contracts\Listable;
use Larsklopstra\Nebula\Fields\Concerns\HasHelperText;
use Larsklopstra\Nebula\Fields\Concerns\HasResource;

class HasOne extends NebulaField implements Listable
{
    use HasHelperText, HasResource;

    public function resolveHasOne($item = null)
    {
        $model = $item ?? request()->item;
        $resource = $this->getResourceInstance();

        return $model
            ->hasOne($resource->model(), $this->name)
            ->first()
            ->{$resource->title()};
    }

    public function canHave()
    {
        /** TODO: fix */
        $resource = $this->getResourceInstance();
        $model = $resource->model();

        return $model::get()->pluck($resource->id(), $resource->title());
    }
}
