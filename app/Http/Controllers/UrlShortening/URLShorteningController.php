<?php

namespace App\Http\Controllers\UrlShortening;

use App\Http\Controllers\Controller;
use App\Request\URLShortening\GetUrlRequest;
use App\Request\URLShortening\URLShorteningRequest;
use App\Services\URLShortening\Action\GetLongURLAction;
use App\Services\URLShortening\Action\URLShorteningAction;

class URLShorteningController extends Controller
{
    public function get(GetUrlRequest $request, GetLongURLAction $action)
    {
        $longUrl = $action->run($request->getShortUrl());

        return response()->json([
            'long_url' => $longUrl,
        ]);
    }

    public function shorten(URLShorteningRequest $request, URLShorteningAction $action)
    {
        $shortUrl = $action->run($request->getUrl());

        return response()->json([
            'short_url' => $shortUrl,
        ]);
    }

}
