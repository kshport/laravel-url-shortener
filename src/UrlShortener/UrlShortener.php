<?php

namespace KShport\LaravelUrlShortener\UrlShortener;

class UrlShortener
{
    private string $shortUrl;

    private string $targetUrl;

    public function setTargetUrl(string $url): static
    {
        // validate url
        $this->targetUrl = $url;

        return $this;
    }

    public function build(): static
    {
        $this->shortUrl = $this->targetUrl;

        return $this;
    }

    public function getShortUrl(): string
    {
        return $this->shortUrl;
    }
}