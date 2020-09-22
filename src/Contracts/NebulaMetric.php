<?php

namespace Larsklopstra\Nebula\Contracts;

use Closure;
use Illuminate\Support\Carbon;

abstract class NebulaMetric
{
    /**
     * Returns the label.
     *
     * @return string
     */
    public function label()
    {
        return '';
    }

    /**
     * Returns the column span of a card.
     *
     * @return int
     */
    public function colSpan(): int
    {
        return 4;
    }

    /**
     * Calculates the given data.
     *
     * @return mixed
     */
    abstract public function calculate();

    /**
     * Specifies for how long a metric should be cached.
     *
     * @return Carbon
     */
    public function cacheFor()
    {
        return now()->addHour();
    }

    /**
     * Return the cache.
     *
     * @param Closure $callback
     * @return mixed
     */
    abstract public function getFromCache(Closure $callback);

    /**
     * Return the blade view for a metric.
     *
     * @return mixed
     */
    abstract public function component();
}
