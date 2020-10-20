<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;

class BelongsTo extends NebulaField
{
    protected $resource;

    public function resource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    public function resolveBelongsTo($item)
    {
        $resource = (new $this->resource);
        $belongsToModel = $resource->model();

        $item::resolveRelationUsing('nebulaRelation', function ($item) use ($belongsToModel) {
            return $item->belongsTo($belongsToModel, $this->name);
        });

        return $item->nebulaRelation()->pluck($resource->title())->first();
    }

    public function resolveRelated($item)
    {
        $resource = (new $this->resource);
        $belongsToModel = $resource->model();

        $item::resolveRelationUsing('nebulaRelation', function ($item) use ($belongsToModel) {
            return $item->belongsTo($belongsToModel, $this->name);
        });

        return $item->nebulaRelation->pluck('id', $resource->title());
    }
}
