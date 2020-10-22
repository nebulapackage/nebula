<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Contracts\ShouldRender;
use Larsklopstra\Nebula\Fields\Concerns\HasHelperText;
use Larsklopstra\Nebula\Fields\Concerns\HasResource;

class HasOne extends NebulaField implements ShouldRender
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
