<?php

namespace KShport\LaravelUrlShortener\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use KShport\LaravelUrlShortener\Models\ShortUrl;
use KShport\LaravelUrlShortener\Tests\TestCase;

class ShortUrlTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function short_url_has_target_url()
    {
        /** @var ShortUrl $shortUrl */
        $shortUrl = ShortUrl::factory()->create(['target_url' => 'https://target.url']);
        $this->assertEquals('https://target.url', $shortUrl->target_url);
    }

    /** @test */
    public function short_url_key_has_configured_length()
    {
        /** @var ShortUrl $shortUrl */
        $shortUrl = ShortUrl::factory()->create(['target_url' => 'https://target.url']);
        $this->assertEquals(strlen($shortUrl->key), config('url-shortener.key_length'));
    }
}