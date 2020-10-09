<?php

namespace Larsklopstra\Nebula\Contracts;

use Closure;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

abstract class NebulaPage
{
    public $canSeeCallback;

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
            ->replaceLast('Page', '');
    }

    /**
     * Returns the slug of the page.
     *
     * @return Stringable
     */
    public function slug()
    {
        return $this->name()->kebab()->lower();
    }

    /**
     * Outputs the page.
     *
     * @return mixed
     */
    public function display()
    {
        if (! method_exists($this, 'render')) {
            throw new Exception('No `render` method defined on '.get_class($this));
        }

        return app()->call([$this, 'render']);
    }

    /**
     * Determine whether or not the page can be accessed.
     *
     * @param  \Closure  $callback
     * @return static
     */
    public function canSee(Closure $callback)
    {
        $this->canSeeCallback = $callback;

        return $this;
    }
}
