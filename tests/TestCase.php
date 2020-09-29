<?php

namespace Larsklopstra\Nebula\Tests;

use Larsklopstra\Nebula\NebulaServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [NebulaServiceProvider::class];
    }
}
