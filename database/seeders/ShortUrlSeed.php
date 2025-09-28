<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShortUrlSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shortUrlsArr = [
            [
                'short_code' => 'amzn',
                'original_url' => 'https://www.amazon.com/',
                'clicks' => 0
            ],
            [
                'short_code' => 'fbx',
                'original_url' => 'https://www.facebook.com/',
                'clicks' => 0
            ],
            [
                'short_code' => 'instagram',
                'original_url' => 'https://www.instagram.com/',
                'clicks' => 0
            ],
            [
                'short_code' => 'netflix',
                'original_url' => 'https://www.netflix.com/',
                'clicks' => 0
            ],
            [
                'short_code' => 'twitter',
                'original_url' => 'https://twitter.com/',
                'clicks' => 0
            ],
            [
                'short_code' => 'youtube',
                'original_url' => 'https://www.youtube.com/',
                'clicks' => 0
            ],
            [
                'short_code' => 'ebay',
                'original_url' => 'https://www.ebay.com/',
                'clicks' => 0
            ],
            [
                'short_code' => 'pinterest',
                'original_url' => 'https://www.pinterest.com/',
                'clicks' => 0
            ],
            [
                'short_code' => 'tiktok',
                'original_url' => 'https://www.tiktok.com/',
                'clicks' => 0
            ],
            [
                'short_code' => 'walmart',
                'original_url' => 'https://www.walmart.com/',
                'clicks' => 0
            ],
            [
                'short_code' => 'etsy',
                'original_url' => 'https://www.etsy.com/',
                'clicks' => 0
            ],
        ];

        foreach ($shortUrlsArr as $shortUrlArr) {
            DB::table("short_urls")->insert($shortUrlArr);
        }
    }
}
