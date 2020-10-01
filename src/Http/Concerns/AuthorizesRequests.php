<?php

namespace Larsklopstra\Nebula\Http\Concerns;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;

trait AuthorizesRequests
{
    protected function authorize($ability, $model)
    {
        $policy = Gate::getPolicyFor($model);

        if (
            $policy &&
            ! App::environment('local') &&
            in_array($ability, get_class_methods($policy))
        ) {
            Gate::authorize($ability, $model);
        }
    }
}
