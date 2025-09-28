<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    public function index(Request $request, $shortCode = null)
    {
        if(!is_null($shortCode)){
            $shortCode = ShortUrl::query()->shortCode($shortCode)->latest()->first();

            if(!empty($shortCode)){

                // increment click
                $shortCode->increment("clicks");

                return redirect()->away($shortCode->original_url);
            }
            // You may fire exception or 404
        }

        return view("welcome");
    }
}
