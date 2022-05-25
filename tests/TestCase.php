<?php

namespace KShport\LaravelUrlShortener\Tests;

use KShport\LaravelUrlShortener\LaravelUrlShortenerServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelUrlShortenerServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}