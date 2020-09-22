<?php

namespace Larsklopstra\Nebula\Http\Middleware;

use Closure;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\ConflictingHeadersException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NebulaIPAuthStrategy
{
    /**
     * Checks if the request ip contains an ip address.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws ConflictingHeadersException
     * @throws BindingResolutionException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function handle(Request $request, Closure $next)
    {
        if (! in_array($request->ip(), config('nebula.allowed_ips'))) {
            abort(404);
        }

        return $next($request);
    }
}
