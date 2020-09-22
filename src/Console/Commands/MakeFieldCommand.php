<?php

namespace Larsklopstra\Nebula\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeFieldCommand extends GeneratorCommand
{
    protected $name = 'nebula:field';

    protected $description = 'Create a Nebula field';

    protected $type = 'Nebula field';

    protected function getStub()
    {
        return __DIR__.'/stubs/field.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Nebula\Fields';
    }
}
