<?php

use App\Http\Controllers\ShortenedUrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{urlToken}', [ShortenedUrlController::class, 'index']);
