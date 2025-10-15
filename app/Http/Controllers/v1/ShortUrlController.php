<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShortUrl\ShortUrlStoreRequest;
use App\Http\Requests\v1\ShortUrl\ShortUrlUpdateRequest;
use App\Models\AccessToken;
use App\Models\ShortUrl;
use App\Support\Facade\ShortUrlFacade;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    public function index(Request $request)
    {

    }

    public function store(ShortUrlStoreRequest $request)
    {
        try{
            $accessToken = ShortUrlFacade::createShortUrl($request->validated());

            return $this->sendResponse(201, "Congratulations! You have successfully added URL Record", $accessToken);
        }
        catch(\Throwable $th){


            return $this->sendResponse(500, "Something went wrong! - ".$th->getMessage(), [], $this->errorArray($th));
        }
    }

    public function edit(ShortUrl $shortUrl)
    {
        return $this->sendResponse(200, "Short URL Record", $shortUrl);
    }

    public function show(Request $request, $id)
    {
        $shortUrl = ShortUrlFacade::findById($id);

        return $this->sendResponse(200, "Short URL Record", $shortUrl);
    }

    public function update(ShortUrlUpdateRequest $request, $id)
    {
        try{
            $shortUrl = ShortUrlFacade::findById($id);

            $shortUrl->update($request->validated());

            return $this->sendResponse(200, "Congratulations! You have successfully updated URL Record", $shortUrl);
        }
        catch(\Throwable $th){

          return $this->sendResponse(500, "Something went wrong! - ".$th->getMessage(), [], $this->errorArray($th));
        }
    }

    public function destroy(Request $request, $id)
    {
        try{
            $shortUrl = ShortUrlFacade::findById($id);
            $shortUrl->delete();

            return $this->sendResponse(200, "Congratulations! You have successfully deleted URL Record");
        }
        catch(\Throwable $th){

          return $this->sendResponse(500, "Something went wrong! - ".$th->getMessage(), [], $this->errorArray($th));
        }
    }
}
