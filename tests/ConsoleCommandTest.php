<?php

namespace Larsklopstra\Nebula\Tests;

use Larsklopstra\Nebula\Tests\TestCase;
use Symfony\Component\Console\Exception\RuntimeException;

final class ConsoleCommandTest extends TestCase
{
    /** @test can run php artisan nebula:install */
    public function can_run_artisan_nebula_install()
    {
        $command = $this->artisan('nebula:install');

        $command->assertExitCode(0);
    }

    /** @test can run php artisan nebula:dashboard */
    public function can_run_artisan_nebula_dashboard()
    {
        $command = $this->artisan('nebula:dashboard', ['name' => 'Users/UserDashboard']);

        $command->assertExitCode(0);
    }

    /** @test cannot run php artisan nebula:dashboard */
    public function cannot_run_artisan_nebula_dashboard_without_name()
    {
        $this->expectException(RuntimeException::class);

        $this->artisan('nebula:dashboard');
    }

    /** @test can run php artisan nebula:field */
    public function can_run_artisan_nebula_field()
    {
        $command = $this->artisan('nebula:field', ['name' => 'Users/UserField']);

        $command->assertExitCode(0);
    }

    /** @test cannot run php artisan nebula:field */
    public function cannot_run_artisan_nebula_field_without_name()
    {
        $this->expectException(RuntimeException::class);

        $this->artisan('nebula:field');
    }

    /** @test can run php artisan nebula:filter */
    public function can_run_artisan_nebula_filter()
    {
        $command = $this->artisan('nebula:filter', ['name' => 'Users/UserFilter']);

        $command->assertExitCode(0);
    }

    /** @test cannot run php artisan nebula:filter */
    public function cannot_run_artisan_nebula_filter_without_name()
    {
        $this->expectException(RuntimeException::class);

        $this->artisan('nebula:filter');
    }

    /** @test can run php artisan nebula:resource */
    public function can_run_artisan_nebula_resource()
    {
        $command = $this->artisan('nebula:resource', ['name' => 'Users/UserResource']);

        $command->assertExitCode(0);
    }

    /** @test cannot run php artisan nebula:resource */
    public function cannot_run_artisan_nebula_resource_without_name()
    {
        $this->expectException(RuntimeException::class);

        $this->artisan('nebula:resource');
    }

    /** @test can run php artisan nebula:resource */
    public function can_run_artisan_nebula_value()
    {
        $command = $this->artisan('nebula:value', ['name' => 'Users/UserValue']);

        $command->assertExitCode(0);
    }

    /** @test cannot run php artisan nebula:value */
    public function cannot_run_artisan_nebula_value_without_name()
    {
        $this->expectException(RuntimeException::class);

        $this->artisan('nebula:value');
    }

    /** @test can run php artisan nebula:page */
    public function can_run_artisan_nebula_page()
    {
        $command = $this->artisan('nebula:page', ['name' => 'ExamplePage']);

        $command->assertExitCode(0);
    }

    /** @test cannot run php artisan nebula:page */
    public function cannot_run_artisan_nebula_page_without_name()
    {
        $this->expectException(RuntimeException::class);

        $this->artisan('nebula:page');
    }
}
