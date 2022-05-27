<?php

namespace KShport\LaravelUrlShortener\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use KShport\LaravelUrlShortener\UrlShortener\UrlShortener;

/**
 * @property int $id
 * @property string $target_url
 * @property string $key
 * @property int $redirect_code
 * @property bool $is_one_time
 * @property Carbon $first_visit_at
 * @property Carbon $active_from
 * @property Carbon $active_to
 * @property array $tracking_data
 */
class ShortUrl extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->key = UrlShortener::getKey();
        });
    }

    protected static function newFactory(): \KShport\LaravelUrlShortener\Database\Factories\ShortUrlFactory
    {
        return \KShport\LaravelUrlShortener\Database\Factories\ShortUrlFactory::new();
    }

    public function resolve(): string
    {
        $urlParts = array_map(function ($item) {
            return str_replace(['http:', 'https:', '/'], '', $item);
        }, [
            env('APP_URL'),
            config('url-shortener.prefix'),
            $this->key
        ]);

        return config('url-shortener.schema').'://'.implode('/', $urlParts);
    }
}