<?php

namespace App\Services\Business;

use App\Models\ShortUrl;

class ShortUrlService
{
    public function createShortUrl(array $data)
    {

        return ShortUrl::query()->create($data);
    }

    public function findById($id)
    {
        return ShortUrl::query()->findOrFail($id);
    }
}