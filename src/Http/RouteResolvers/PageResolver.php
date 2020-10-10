<?php

namespace Larsklopstra\Nebula\Http\RouteResolvers;

use Exception;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Larsklopstra\Nebula\Nebula;

class PageResolver
{
    /**
     * Binds the page routes to the list of routes.
     *
     * @return void
     * @throws BindingResolutionException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public static function bind(): void
    {
        Route::bind('page', function ($value) {
            $pages = Nebula::availablePages();

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
