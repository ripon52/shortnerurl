<?php

namespace App\Services\Concrete;

use App\Services\Business\AccessTokenService;

class AccessTokenConcreteService
{
    protected $accessTokenService;

    public function __construct()
    {
        $this->accessTokenService = new AccessTokenService();
    }

    public function createAccessToken(array $data)
    {
        return $this->accessTokenService->createAccessToken($data);
    }
}