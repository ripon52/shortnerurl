<?php

namespace App\Support\Facade;

use Illuminate\Support\Facades\Facade;

class ShortUrlFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return "shortUrlFacade";
    }
}