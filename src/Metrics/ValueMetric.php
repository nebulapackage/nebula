<?php

namespace Larsklopstra\Nebula\Metrics;

use Closure;
use Exception;
use Larsklopstra\Nebula\Contracts\NebulaMetric;

abstract class ValueMetric extends NebulaMetric
{
    /**
     * Returns the prefix.
     *
     * @return string
     */
    public function prefix()
    {
        return '';
    }

    /**
     * Returns the suffix.
     *
     * @return string
     */
    public function suffix()
    {
        return '';
    }

    /**
     * Returns the difference between now and last month.
     *
     * @return int|float
     */
    public function calculateDifference()
    {
        [$current, $old] = $this->calculate();

        if (empty($old)) {
            return 100;
        }

        return ($current - $old) / $old * 100;
    }

    /**
     * Build the query of the current and previous metrics and run a closure on them.
     *
     * @param  mixed $class
     * @param  \Closure $callback
     * @return \Closure
     */
    protected function query($class, Closure $callback)
    {
        $current = $class::query()->withoutGlobalScopes()
            ->whereBetween('created_at', [now()->subMonth(), now()]);

        $old = $class::query()->withoutGlobalScopes()
            ->whereBetween('created_at', [now()->subMonths(2), now()->subMonth()]);

        return $callback($current, $old);
    }

    /**
     * Returns the avarage based on a given eloquent model `$class` and its column `$column`.
     *
     * @param mixed $class
     * @param mixed $column
     * @return mixed
     * @throws Exception
     */
    protected function average($class, $column)
    {
        return $this->getFromCache(function () use ($class, $column) {
            return $this->query($class, function ($current, $old) use ($column) {
                return [
                    $current->average($column),
                    $old->average($column),
                ];
            });
        });
    }

    /**
     * Returns the count of the given eloquent model `$class`.
     *
     * @param mixed $class
     * @return mixed
     * @throws Exception
     */
    protected function count($class)
    {
        return $this->getFromCache(function () use ($class) {
            return $this->query($class, function ($current, $old) {
                return [
                    $current->count(),
                    $old->count(),
                ];
            });
        });
    }

    /**
     * Returns the sum of the given eloquent model `$class` and its column `$column`.
     *
     * @param mixed $class
     * @param mixed $column
     * @return mixed
     * @throws Exception
     */
    protected function sum($class, $column)
    {
        return $this->getFromCache(function () use ($class, $column) {
            return $this->query($class, function ($current, $old) use ($column) {
                return [
                    $current->sum($column),
                    $old->sum($column),
                ];
            });
        });
    }

    /**
     * Returns the max of the given eloquent model `$class` and its column `$column`.
     *
     * @param mixed $class
     * @param mixed $column
     * @return mixed
     * @throws Exception
     */
    protected function max($class, $column)
    {
        return $this->getFromCache(function () use ($class, $column) {
            return $this->query($class, function ($current, $old) use ($column) {
                return [
                    $current->max($column),
                    $old->max($column),
                ];
            });
        });
    }

    /**
     * Returns the min of the given eloquent model `$class` and its column `$column`.
     *
     * @param mixed $class
     * @param mixed $column
     * @return mixed
     * @throws Exception
     */
    protected function min($class, $column)
    {
        return $this->getFromCache(function () use ($class, $column) {
            return $this->query($class, function ($current, $old) use ($column) {
                return [
                    $current->min($column),
                    $old->min($column),
                ];
            });
        });
    }

    /**
     * Check if the cache contains a metric and returns the value, otherwise it'll refetch the data.
     *
     * @param Closure $callback
     * @return mixed
     * @throws Exception
     */
    public function getFromCache(Closure $callback)
    {
        $cacheName = class_basename($this);

        return cache()->remember("$cacheName.valueMetric", $this->cacheFor(), $callback);
    }

    /**
     * Returns the required blade view to render.
     *
     * @return string
     */
    public function component()
    {
        return 'nebula::metrics.value';
    }
}
