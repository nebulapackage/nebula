<?php

namespace Larsklopstra\Nebula\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

abstract class NebulaFilter
{
    /**
     * Return the filter its name.
     *
     * @return string
     */
    public function name()
    {
        return class_basename($this);
    }

    /**
     * Returns the filter its label.
     *
     * @return Stringable
     */
    public function label()
    {
        return Str::of(class_basename($this))
            ->replaceLast('Filter', '')
            ->kebab()
            ->replace('-', ' ')
            ->lower()
            ->ucfirst();
    }

    /**
     * Returns the query builder uses for the filter.
     *
     * @param Builder $query
     * @param Request $request
     * @return Builder
     */
    abstract public function build(Builder $query, Request $request): Builder;
}
