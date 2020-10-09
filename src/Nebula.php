<?php

namespace Larsklopstra\Nebula;

use Larsklopstra\Nebula\Contracts\NebulaDashboard;
use Larsklopstra\Nebula\Contracts\NebulaPage;
use Larsklopstra\Nebula\Contracts\NebulaResource;

class Nebula
{
    protected static array $resources = [];

    protected static array $dashboards = [];

    protected static array $pages = [];

    /**
     * Manually register resources.
     *
     * @param  array  $resources
     * @return static
     */
    public static function resources(array $resources = [])
    {
        static::$resources = array_unique(
            array_merge(static::$resources, $resources)
        );

        return new static;
    }

    /**
     * Manually register dashboards.
     *
     * @param  array  $dashboards
     * @return static
     */
    public static function dashboards(array $dashboards = [])
    {
        static::$dashboards = array_unique(
            array_merge(static::$dashboards, $dashboards)
        );

        return new static;
    }

    /**
     * Manually register pages.
     *
     * @param  array  $pages
     * @return static
     */
    public static function pages(array $pages = [])
    {
        static::$pages = array_unique(
            array_merge(static::$pages, $pages)
        );

        return new static;
    }

    /**
     * Get the registered resources.
     *
     * @return array
     */
    public static function availableResources()
    {
        return collect(static::$resources)
            ->map(fn ($resource) => $resource instanceof NebulaResource ? $resource : new $resource)
            ->merge(config('nebula.resources'))
            ->unique()
            ->toArray();
    }

    /**
     * Get the registered dashboards.
     *
     * @return array
     */
    public static function availableDashboards()
    {
        return collect(static::$dashboards)
            ->map(fn ($dashboard) => $dashboard instanceof NebulaDashboard ? $dashboard : new $dashboard)
            ->merge(config('nebula.dashboards'))
            ->unique()
            ->toArray();
    }

    /**
     * Get the registered pages.
     *
     * @return array
     */
    public static function availablePages()
    {
        return collect(static::$pages)
            ->map(fn ($page) => $page instanceof NebulaPage ? $page : new $page)
            ->merge(config('nebula.pages'))
            ->unique()
            ->toArray();
    }
}
