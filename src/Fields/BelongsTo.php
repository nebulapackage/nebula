<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Fields\Concerns\HasHelperText;

class BelongsTo extends NebulaField
{
    use HasHelperText;

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

    public function resolveRelated()
    {
        $resource = (new $this->resource);
        $belongsToModel = $resource->model();

        return $belongsToModel::pluck('id', $resource->title());
    }
}
