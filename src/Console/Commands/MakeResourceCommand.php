<?php

namespace Larsklopstra\Nebula\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeResourceCommand extends GeneratorCommand
{
    protected $name = 'nebula:resource';

    protected $description = 'Create a Nebula resource';

    protected $type = 'Nebula resource';

    protected function getStub()
    {
        return __DIR__.'/stubs/resource.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Nebula\Resources';
    }
}
