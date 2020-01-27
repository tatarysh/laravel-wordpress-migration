<?php

namespace Tests;

use Illuminate\Foundation\Application;
use TataRysh\LaravelWordpressMigration\WordpressServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @inheritDoc
     */
    protected function getPackageProviders($app): array
    {
        return [
            WordpressServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testing');
    }
}
