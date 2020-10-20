<?php

namespace Larsklopstra\Nebula\Fields;

use App\Models\User;
use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Contracts\ShouldRenderTable;

class HasMany extends NebulaField implements ShouldRenderTable
{
    protected $resource;

    public function resource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    public function getResource()
    {
        return (new $this->resource);
    }

    public function resolveHasMany($item)
    {
        $resource = (new $this->resource);
        $belongsToModel = $resource->model();

        $item::resolveRelationUsing('nebulaRelation', function ($item) use ($belongsToModel) {
            return $item->hasMany($belongsToModel, $this->name);
        });

        return $item->nebulaRelation()->paginate();
    }
}
