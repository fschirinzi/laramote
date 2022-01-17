<?php

namespace Fschirinzi\LaraMote;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaraMoteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->environment('production')) {
            return;
        }

        Route::middlewareGroup('LaraMote', config('laramote.middleware', []));

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laramote.php' => config_path('laramote.php'),
            ], 'laramote-config');

            $this->publishes([
                __DIR__.'/../stubs/LaraMoteServiceProvider.stub' => app_path('Providers/LaraMoteServiceProvider.php'),
            ], 'laramote-provider');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/laramote.php', 'laramote');

        // TODO: Commands not working yet
        // ERROR: Target class [Fschirinzi\LaraMote\Console\InstallCommand] does not exist.
        $this->commands(
            [
                //InstallCommand::class,
                //PublishCommand::class,
            ]
        );

        // Register the main class to use with the facade
        $this->app->singleton(
            'laramote', function () {
                return new LaraMote;
            }
        );
    }
}
