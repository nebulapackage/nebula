<?php

namespace Larsklopstra\Nebula\Contracts;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

abstract class NebulaPage
{
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
     * Returns the name of the page.
     *
     * @return Stringable
     */
    public function name()
    {
        return Str::of(class_basename($this))
            ->replaceLast('Page', '')
            ->kebab()
            ->lower()
            ->plural();
    }

    /**
     * Returns the page singular name.
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
     * Returns the page its plural name.
     *
     * @return string
     */
    public function pluralName()
    {
        return Str::plural($this->singularName());
    }

    /**
     * Outputs the page.
     *
     * @return
     */
    public function display()
    {
        if (! method_exists($this, 'render')) {
            throw new Exception('No `render` method defined on '.get_class($this));
        }

        return app()->call([$this, 'render']);
    }
}
