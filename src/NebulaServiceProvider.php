<?php

namespace Larsklopstra\Nebula;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Larsklopstra\Nebula\Console\Commands\InstallCommand;
use Larsklopstra\Nebula\Console\Commands\MakeDashboardCommand;
use Larsklopstra\Nebula\Console\Commands\MakeFieldCommand;
use Larsklopstra\Nebula\Console\Commands\MakeFilterCommand;
use Larsklopstra\Nebula\Console\Commands\MakePageCommand;
use Larsklopstra\Nebula\Console\Commands\MakeResourceCommand;
use Larsklopstra\Nebula\Console\Commands\MakeValueMetricCommand;
use Larsklopstra\Nebula\Http\RouteResolvers\DashboardResolver;
use Larsklopstra\Nebula\Http\RouteResolvers\ItemResolver;
use Larsklopstra\Nebula\Http\RouteResolvers\PageResolver;
use Larsklopstra\Nebula\Http\RouteResolvers\ResourceResolver;

class NebulaServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang', 'nebula');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nebula');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewComponentsAs('nebula', []);

        $this->mapWebRoutes();

        ResourceResolver::bind();
        ItemResolver::bind();
        DashboardResolver::bind();
        PageResolver::bind();

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
}
