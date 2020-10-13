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
     * Render the view for the dashboard.
     *
     * @return mixed
     */
    public function display()
    {
        return app()->call([$this, 'render']);
    }

    /**
     * Render the contents of the dashboard.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('nebula::dashboards.default', [
            'dashboard' => $this,
        ]);
    }
}
