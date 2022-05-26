<?php

namespace KShport\LaravelUrlShortener\Providers;

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
    }
}