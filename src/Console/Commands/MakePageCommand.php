<?php

namespace Larsklopstra\Nebula\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakePageCommand extends GeneratorCommand
{
    protected $name = 'nebula:page';

    protected $description = 'Create a Nebula page';

    protected $type = 'Nebula page';

    public function handle()
    {
        parent::handle();

        File::ensureDirectoryExists($this->viewPath('nebula/pages'));

        File::put($this->viewPath("nebula/pages/{$this->viewName()}.blade.php"), '');
    }

    protected function buildClass($name)
    {
        return str_replace(
            'dummy-view',
            $this->viewName(),
            parent::buildClass($name)
        );
    }

    protected function getStub()
    {
        return __DIR__.'/stubs/page.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Nebula\Pages';
    }

    protected function viewName()
    {
        return (string) Str::of($this->argument('name'))
            ->replaceLast('Page', '')
            ->kebab()
            ->lower();
    }
}
