<?php

namespace Larsklopstra\Nebula\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeFilterCommand extends GeneratorCommand
{
    protected $name = 'nebula:filter';

    protected $description = 'Create a Nebula filter';

    protected $type = 'Nebula filter';

    protected function getStub()
    {
        return __DIR__.'/stubs/filter.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Nebula\Filters';
    }
}
