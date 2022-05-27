<?php

namespace KShport\LaravelUrlShortener\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use KShport\LaravelUrlShortener\Models\ShortUrl;
use KShport\LaravelUrlShortener\Tests\TestCase;
use KShport\LaravelUrlShortener\UrlShortener\UrlShortener;

class UrlShortenerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_has_key()
    {
        $urlShortener = new UrlShortener();
        $shortUrl = $urlShortener
            ->setTargetUrl('https://test.target/')
            ->build()
            ->getShortUrl();
        $this->assertIsString($shortUrl->key);
    }

    /** @test */
    public function test_one_time_visit_url()
    {
        $urlShortener = new UrlShortener();
        $shortUrl = $urlShortener
            ->setTargetUrl('https://test.target/')
            ->setOneTine()
            ->build()
            ->getShortUrl();
        $this->assertTrue($shortUrl->is_one_time);
    }

    /** @test */
    /*public function test_redirect_status_code()
    {
    }*/

    /** @test */
    public function test_tracking_closure()
    {
        $urlShortener = new UrlShortener();
        $urlShortener
            ->setTargetUrl('https://test.target/')
            ->build()
            ->setTrackingClosure(function (ShortUrl $shortUrl, $request, $agent) {
                //dd($request);
            });
    }
}