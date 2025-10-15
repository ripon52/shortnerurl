<?php

namespace App\Services\Concrete;

use App\Services\Business\ShortUrlService;

class ShortUrlConcrete
{
    protected $shortUrlService;

    public function __construct()
    {
        $this->shortUrlService = new ShortUrlService();
    }

    public function createShortUrl(array $data)
    {
        return $this->shortUrlService->createShortUrl($data);
    }

    public function findById($id)
    {
        return $this->shortUrlService->findById($id);
    }
}