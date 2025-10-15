<?php

namespace App\Http\Requests\v1\ShortUrl;

use App\Traits\Api\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ShortUrlUpdateRequest extends FormRequest
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
            "short_code"   => ["required", Rule::unique("short_urls")->where("short_code", $this->short_code)->ignore($this->short_url->id)]
        ];
    }
}
