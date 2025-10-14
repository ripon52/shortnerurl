<?php

namespace App\Services\Business;

use App\Models\AccessToken;

class AccessTokenService
{
    public function createAccessToken(array $data)
    {

        return AccessToken::query()->create($data);
    }
}