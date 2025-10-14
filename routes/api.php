<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\v1\AccessTokenController;

Route::prefix("v1")->group(function () {
   Route::resource("access_tokens", AccessTokenController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
