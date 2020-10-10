<?php

namespace Larsklopstra\Nebula\Http\RouteResolvers;

use Exception;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class ResourceResolver
{
    /**
     * Binds a "resource" route to the list of routes.
     *
     * @return void
     * @throws BindingResolutionException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public static function bind(): void
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
}
