<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccessToken\AccessTokenStoreRequest;
use App\Models\AccessToken;
use App\Support\Facade\TokenFacade;
use Illuminate\Http\Request;

class AccessTokenController extends Controller
{
    public function index(Request $request)
    {

    }

    public function store(AccessTokenStoreRequest $request)
    {
        try{
            $accessToken = TokenFacade::createAccessToken($request->validated());

            return $this->sendResponse(201, "Congratulations! You have successfully added URL Record", $accessToken);
        }
        catch(\Throwable $th){

            return $this->sendResponse(500, "Something went wrong! - ".$th->getMessage(), [], $this->errorArray($th));
        }
    }

    public function edit(AccessToken $accessToken)
    {

    }

    public function show(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {

    }


}
