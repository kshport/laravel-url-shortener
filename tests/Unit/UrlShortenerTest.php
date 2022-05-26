<?php

namespace KShport\LaravelUrlShortener\Tests\Unit;

use KShport\LaravelUrlShortener\Tests\TestCase;
use KShport\LaravelUrlShortener\UrlShortener\UrlShortener;

class UrlShortenerTest extends TestCase
{
    public function testing_test()
    {
        $urlShortener = new UrlShortener();
        $shortUrl = $urlShortener
            ->setTargetUrl('https://test.target/')
            ->build()
            ->getShortUrl();
        $this->assertSame('https://test.target/', $shortUrl);
    }
}