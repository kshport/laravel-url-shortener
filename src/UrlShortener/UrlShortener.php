<?php

namespace KShport\LaravelUrlShortener\UrlShortener;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use KShport\LaravelUrlShortener\Models\ShortUrl;

class UrlShortener
{
    private ShortUrl $model;

    public function __construct()
    {
        $this->model = new ShortUrl();
    }

    public function setTargetUrl(string $targetUrl): static
    {
        $this->model->target_url = $targetUrl;

        return $this;
    }

    public function setTrackingClosure(callable $closure)
    {
        $request = \Illuminate\Support\Facades\Request::all();
        $agent = null;
        $closure($this->model, $request, $agent);
    }

    public function setOneTine(): static
    {
        $this->model->is_one_time = true;

        return $this;
    }

    public function setRedirectStatusCode(int $statusCode): static
    {
        $this->model->redirect_code = $statusCode;

        return $this;
    }

    public function build(): static
    {
        $this->model->save();

        return $this;
    }

    public function getShortUrl(): ShortUrl
    {
        return $this->model;
    }

    public static function getKey(): string
    {
        return Str::random(config('url-shortener.key_length'));
    }
}