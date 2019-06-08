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
        $url->increment('clicks');
        return redirect()->route('redirectTo',['id' => $url->id]);
        
    }

    public function redirectTo($id){
        $url = URL::find($id);
        return redirect($url->originalURL,301);
    }
}
