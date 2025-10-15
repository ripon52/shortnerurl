<?php

namespace App\Http\Requests\ShortUrl;

use App\Traits\Api\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class ShortUrlStoreRequest extends FormRequest
{
    use ApiResponseTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "token"        => "required|exists:access_tokens,token",
            "original_url" => "required",
            "short_code"   => "required|unique:short_urls,short_code"
        ];
    }


}
