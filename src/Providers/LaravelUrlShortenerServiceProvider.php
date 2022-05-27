<?php

namespace KShport\LaravelUrlShortener\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaravelUrlShortenerServiceProvider extends ServiceProvider
{
    private const CONFIG_NAME = 'url-shortener';

    private const CONFIG_PATH = __DIR__.'/../../config/config.php';

    public function register(): void
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, self::CONFIG_NAME);
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::CONFIG_PATH => config_path(self::CONFIG_NAME.'.php'),
            ], 'config');
        }

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->registerRoutes();
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        });
    }

    protected function routeConfiguration(): array
    {
        return [
            'prefix' => config('url-shortener.prefix'),
            'middleware' => config('url-shortener.middleware'),
        ];
    }
}