<?php

namespace App\Http\Controllers;

use App\Models\URL;

class URLController extends Controller
{
    public function show($code){
        $url = URL::where('code', $code)->first();
        if(!$url){
            abort(404);
        }
        return redirect($url->url,301);
    }
}
