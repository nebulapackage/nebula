<?php

namespace Larsklopstra\Nebula\Http\RouteResolvers;

use Illuminate\Support\Facades\Route;

class ItemResolver
{
    /**
     * Binds the "item" route to the list of routes.
     *
     * @return void
     * @throws NotFoundHttpException
     */
    public static function bind(): void
    {
        Route::bind('item', function ($value) {
            $model = request()->resource->model();

            return $model::withoutGlobalScopes()
                ->where((new $model)->getRouteKeyName(), $value)
                ->firstOrFail();
        });
    }
}
