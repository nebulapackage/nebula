<?php

namespace Larsklopstra\Nebula\Http\RouteResolvers;

abstract class Resolver
{
    abstract public static function bind(): void;
}
