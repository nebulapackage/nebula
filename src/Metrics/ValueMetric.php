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
            $current = $class::query()->withoutGlobalScopes()
                ->whereBetween('created_at', [now()->subMonth(), now()])
                ->average($column);

            $old = $class::query()->withoutGlobalScopes()
                ->whereBetween('created_at', [now()->subMonths(2), now()->subMonth()])
                ->average($column);

            return [
                $current,
                $old,
            ];
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
            $current = $class::query()->withoutGlobalScopes()
                ->whereBetween('created_at', [now()->subMonth(), now()])
                ->count();

            $old = $class::query()->withoutGlobalScopes()
                ->whereBetween('created_at', [now()->subMonths(2), now()->subMonth()])
                ->count();

            return [
                $current,
                $old,
            ];
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
            $current = $class::query()->withoutGlobalScopes()
                ->whereBetween('created_at', [now()->subMonth(), now()])
                ->sum($column);

            $old = $class::query()->withoutGlobalScopes()
                ->whereBetween('created_at', [now()->subMonths(2), now()->subMonth()])
                ->sum($column);

            return [
                $current,
                $old,
            ];
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
            $current = $class::query()->withoutGlobalScopes()
                ->whereBetween('created_at', [now()->subMonth(), now()])
                ->max($column);

            $old = $class::query()->withoutGlobalScopes()
                ->whereBetween('created_at', [now()->subMonths(2), now()->subMonth()])
                ->max($column);

            return [
                $current,
                $old,
            ];
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
            $current = $class::query()->withoutGlobalScopes()
                ->whereBetween('created_at', [now()->subMonth(), now()])
                ->min($column);

            $old = $class::query()->withoutGlobalScopes()
                ->whereBetween('created_at', [now()->subMonths(2), now()->subMonth()])
                ->min($column);

            return [
                $current,
                $old,
            ];
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
