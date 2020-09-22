<?php

namespace Larsklopstra\Nebula\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeValueMetricCommand extends GeneratorCommand
{
    protected $name = 'nebula:value';

    protected $description = 'Create a Nebula value metric';

    protected $type = 'Nebula value metric';

    protected function getStub()
    {
        return __DIR__.'/stubs/value.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Nebula\Metrics';
    }
}
