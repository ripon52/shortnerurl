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

                $data["shortCode"] = $shortCode;
            }else{
                $data["invalidCodeMsg"] = "Uh-oh! We can’t seem to find the page you’re looking for right now.";
            }
        }

        return view("welcome")->with($data);
    }
}
