<?php

namespace Larsklopstra\Nebula\Contracts;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

abstract class NebulaDashboard
{
    /**
     * Specifies which metrics should be displayed.
     *
     * @return array
     */
    public function metrics(): array
    {
        return [];
    }

    /**
     * Specifies which icon should be used.
     *
     * @return string
     */
    public function icon()
    {
        return 'tag';
    }

    /**
     * Returns the name of the dashboard.
     *
     * @return Stringable
     */
    public function name()
    {
        return Str::of(class_basename($this))
            ->replaceLast('Dashboard', '')
            ->kebab()
            ->lower()
            ->plural();
    }

    /**
     * Returns the dashboard its singular name.
     *
     * @return Stringable
     */
    public function singularName()
    {
        return Str::of($this->name())
            ->replace('-', '')
            ->singular();
    }

    /**
     * Returns the dashboard its plural name.
     *
     * @return string
     */
    public function pluralName()
    {
        return Str::plural($this->singularName());
    }

    /**
     * Returns the label for the dashboard.
     *
     * @return string
     */
    public function label()
    {
        return __('Last month');
    }
}
