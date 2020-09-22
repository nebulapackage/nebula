<?php

namespace Larsklopstra\Nebula\Http\Middleware;

use Closure;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NebulaEmailAuthStrategy
{
    /**
     * Checks if the request email contains an allowed email.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws BindingResolutionException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            empty($request->user()->email) ||
            ! in_array($request->user()->email, config('nebula.allowed_emails'))
        ) {
            abort(404);
        }

        return $next($request);
    }
}
