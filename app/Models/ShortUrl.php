<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $table = "short_urls";

    protected $fillable = [
        "original_url",
        "short_code",
        "expire_at",
        "clicks",
    ];

    public function scopeShortCode($query, $shortCode)
    {
        $query->where("short_urls.short_code", $shortCode);
    }
}
