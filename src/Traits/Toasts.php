<?php

namespace Larsklopstra\Nebula\Traits;

use Illuminate\Contracts\Container\BindingResolutionException;

trait Toasts
{
    /**
     * Flash a toast message to the session.
     *
     * @param string $message
     * @return void
     * @throws BindingResolutionException
     */
    public function toast(string $message): void
    {
        session()->flash('toast', $message);
    }
}
