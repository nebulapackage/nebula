<?php

namespace Larsklopstra\Nebula\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'nebula:install';

    protected $description = 'Install Nebula in your application';

    public function handle()
    {
        $this->call('vendor:publish', [
            '--provider' => "Larsklopstra\Nebula\NebulaServiceProvider",
            '--tag' => 'config',
        ]);

        $this->call('vendor:publish', [
            '--provider' => "Larsklopstra\Nebula\NebulaServiceProvider",
            '--tag' => 'public',
        ]);
    }
}
