<?php

namespace TataRysh\LaravelWordpressMigration;

use Illuminate\Support\ServiceProvider;

class WordpressServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register(): void
    {
        if ($this->app->environment('testing')) {
            $this->mergeConfigFrom(__DIR__.'/../config/wordpress_migration.php', 'wordpress_migration');
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/wordpress_migration.php' => config_path('wordpress_migration.php'),
        ]);
    }
}
