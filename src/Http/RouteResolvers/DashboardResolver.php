<?php

namespace Larsklopstra\Nebula\Http\RouteResolvers;

use Exception;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Larsklopstra\Nebula\Nebula;

class DashboardResolver extends Resolver
{
    /**
     * Binds the "dashboard" route to the list of routes.
     *
     * @return void
     * @throws BindingResolutionException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public static function bind(): void
    {
        Route::bind('dashboard', function ($value) {
            $dashboards = Nebula::availableDashboards();

            if (empty($dashboards)) {
                throw new Exception('No dashboards set in the nebula config.');
            }

            foreach ($dashboards as $dashboard) {
                $dashboardExists = Str::of($dashboard->name())
                    ->lower()
                    ->is($value);

                if ($dashboardExists) {
                    return $dashboard;
                }
            }

            throw new Exception("Dashboard $value not found.");
        });
    }
}
