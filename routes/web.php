<?php

use Illuminate\Support\Facades\Route;

Route::get('/{shortCode?}', [\App\Http\Controllers\ShortCodeController::class,"index"]);
