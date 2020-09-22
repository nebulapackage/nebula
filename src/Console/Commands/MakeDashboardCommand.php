<?php

namespace Larsklopstra\Nebula\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeDashboardCommand extends GeneratorCommand
{
    protected $name = 'nebula:dashboard';

    protected $description = 'Create a Nebula dashboard';

    protected $type = 'Nebula dashboard';

    protected function getStub()
    {
        return __DIR__.'/stubs/dashboard.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Nebula\Dashboards';
    }
}
