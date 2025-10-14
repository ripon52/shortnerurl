<?php

namespace App\Traits\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Client\HttpClientException;

trait ApiResponseTrait
{
    public function sendResponse($code, $message, $data = [], $error = [], $optional = [])
    {
        $response = [
            "status"  => $this->getStatusByCode($code),
            "code"    => $code,
            "message" => $message,
            "data"    => $data,
            "error"   => $error,
            "optional" => $optional,
        ];

        return response()->json($response, $code);
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpClientException(
            $this->sendResponse(
            422,
            "Sorry! Validation Failed",
            [],
            $validator->errors()->all()
        ));
    }

    public function getStatusByCode($code)
    {
        return in_array($code,[200,201,203]);
    }

    public function errorArray($e)
    {
        return [
            "message" => $e->getMessage(),
            "line" => $e->getLine(),
            "file" => $e->getFile(),
        ];
    }

}