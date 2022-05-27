<?php

namespace KShport\LaravelUrlShortener\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use KShport\LaravelUrlShortener\Models\ShortUrl;
use KShport\LaravelUrlShortener\Tests\TestCase;

class UrlResolveTest extends TestCase
{
    use RefreshDatabase;

    public function test_short_url_resolving()
    {
        /** @var ShortUrl $shortUrl */
        $shortUrl = ShortUrl::factory()->create(['target_url' => 'https://target.url']);
        $response = $this->post($shortUrl->resolve());
        //dd($response);
    }
}