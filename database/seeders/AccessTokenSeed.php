<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccessTokenSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accessTokenArr = [];

        for ($i=0; $i < 50; $i++) {
            $accessTokenArr[] = [
                "token" => Str::uuid(),
                "total_used" => 0,
                "expiration_datetime" => now()->addYears(3),
                "is_active" => 1,
            ];
        }

        DB::table('access_tokens')->insert($accessTokenArr);
    }
}
