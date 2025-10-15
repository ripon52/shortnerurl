<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\v1\AccessTokenController;
use App\Http\Controllers\v1\ShortUrlController;

Route::prefix("v1")->group(function () {
   Route::resource("access_tokens", AccessTokenController::class);
   Route::resource("short_urls", ShortUrlController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
