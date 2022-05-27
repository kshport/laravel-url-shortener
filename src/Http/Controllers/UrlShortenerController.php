<?php

namespace KShport\LaravelUrlShortener\Http\Controllers;

use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{
    public function __invoke(Request $request)
    {
        dd('invoke');
    }
}