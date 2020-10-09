<?php

namespace Larsklopstra\Nebula;

use Exception;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Larsklopstra\Nebula\Console\Commands\InstallCommand;
use Larsklopstra\Nebula\Console\Commands\MakeDashboardCommand;
use Larsklopstra\Nebula\Console\Commands\MakeFieldCommand;
use Larsklopstra\Nebula\Console\Commands\MakeFilterCommand;
use Larsklopstra\Nebula\Console\Commands\MakePageCommand;
use Larsklopstra\Nebula\Console\Commands\MakeResourceCommand;
use Larsklopstra\Nebula\Console\Commands\MakeValueMetricCommand;

class NebulaServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang', 'nebula');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nebula');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewComponentsAs('nebula', []);

        $this->mapWebRoutes();

        $this->resourceResolver();
        $this->itemResolver();
        $this->dashboardResolver();
        $this->pageResolver();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/nebula.php' => config_path('nebula.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/nebula'),
            ], 'public');

            $this->commands([
                InstallCommand::class,
                MakeResourceCommand::class,
                MakeValueMetricCommand::class,
                MakeDashboardCommand::class,
                MakeFilterCommand::class,
                MakeFieldCommand::class,
                MakePageCommand::class,
            ]);
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/nebula.php', 'nebula');
    }

    public function mapWebRoutes(): void
    {
        Route::middleware(['web', config('nebula.auth_strategy')])
            ->prefix(config('nebula.prefix'))
            ->domain(config('nebula.domain', null))
            ->name('nebula.')
            ->group(__DIR__.'/../routes/web.php');
    }

    public function resourceResolver(): void
    {
        Route::bind('resource', function ($value) {
            $resources = config('nebula.resources');

            if (empty($resources)) {
                throw new Exception('No resources set in the nebula config.');
            }

            foreach ($resources as $resource) {
                $resourceExists = Str::of($resource->name())
                    ->lower()
                    ->is($value);

                if ($resourceExists) {
                    return $resource;
                }
            }

            throw new Exception("Resource $value not found.");
        });
    }

    public function dashboardResolver(): void
    {
        Route::bind('dashboard', function ($value) {
            $dashboards = config('nebula.dashboards');

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

    public function itemResolver(): void
    {
        Route::bind('item', function ($value) {
            $model = request()->resource->model();

            return $model::withoutGlobalScopes()
                ->where((new $model)->getRouteKeyName(), $value)
                ->firstOrFail();
        });
    }

    public function pageResolver(): void
    {
        Route::bind('page', function ($value) {
            $pages = config('nebula.pages', []);

            if (empty($pages)) {
                throw new Exception('No pages set in the nebula config.');
            }

            foreach ($pages as $page) {
                $pageExists = Str::of($page->slug())
                    ->lower()
                    ->is($value);

                if ($pageExists) {
                    return $page;
                }
            }

            throw new Exception("Page {$page} not found.");
        });
    }
}
