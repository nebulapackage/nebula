<?php

namespace Larsklopstra\Nebula\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;

class StartController
{
    /**
     * Returns the starter view.
     *
     * @return View
     * @throws BindingResolutionException
     */
    public function __invoke(): View
    {
        return view('nebula::start');
    }
}
