<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortenedUrlRequest;
use App\Models\ShortenedUrl;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ShortenedUrlController extends Controller
{

    public function index($urlToken)
    {
        if ($shortenedUrl = ShortenedUrl::whereShortenedUrl($urlToken)->first()) {
            $shortenedUrl->clicks++;
            $shortenedUrl->save();
            return Redirect::to($shortenedUrl->original_url);
        }

        return abort(404, 'URL not found');
    }

    public function store(ShortenedUrlRequest $shortenedUrlRequest)
    {
        return ShortenedUrl::create([
            'original_url'  => $shortenedUrlRequest->original_url,
            'shortened_url' => config('app.url') . '/' . Str::random(8),
        ]);
    }
}
