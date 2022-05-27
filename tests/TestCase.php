<?php

namespace KShport\LaravelUrlShortener\Tests;

use KShport\LaravelUrlShortener\Providers\LaravelUrlShortenerServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelUrlShortenerServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        //$shortUrlMigration = include __DIR__.'/../database/migrations/2022_05_27_053624_create_short_urls_table.php';
        //(new $shortUrlMigration())->up();
    }
}