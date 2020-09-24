<?php

namespace Larsklopstra\Nebula\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Larsklopstra\Nebula\Contracts\NebulaDashboard;
use Larsklopstra\Nebula\Traits\Toasts;

class DashboardController
{
    use Toasts;

    /**
     * Renders the dashboard view with metrics.
     *
     * @param NebulaDashboard $dashboard
     * @return View
     * @throws BindingResolutionException
     */
    public function index(NebulaDashboard $dashboard): View
    {
        return view('nebula::dashboards.index', [
            'dashboard' => $dashboard,
        ]);
    }
}
