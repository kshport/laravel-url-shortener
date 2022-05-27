<?php

use Illuminate\Support\Facades\Route;
use KShport\LaravelUrlShortener\Http\Controllers\UrlShortenerController;

Route::get('/', [UrlShortenerController::class]);