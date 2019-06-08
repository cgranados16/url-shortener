<?php

namespace App\Http\Controllers\API;

use App\Models\URL;
use Validator;
use App\Http\Resources\URL as URLResource;
use Illuminate\Http\Request;
use Tuupola\Base62;
use App\Http\Controllers\Controller;

class URLController extends Controller
{
    private $rules = [
        'url' => 'required|url',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return URLResource::collection(URL::all());
    }

    /**
     * Display a single resource.
     */
    public function show($code)
    {
        $url = URL::where('code', $code)->first();
        if(!$url){
            return response('URL Not Found',404);
        }
        return $url;
    }
    

    /**
     * Takes a URL and returns a 6 characters long
     * code using Tuupola\Base62 library to hash the input.
     */
    public function getCode($longURL)
    {
        $base62 = new Base62();
        $hash = $base62->encode($longURL);
        $shortURL = $this->getFirstAvailableCode($hash, 0);
        
        return $shortURL;
    }

    /**
     * Recursive function that looks for the first
     * code available in the hash.
     *  If the first 6 characters aren't available 
     *  look for the next 6 in the hash and so on.
     */
    public function getFirstAvailableCode($hash, $start){
        $shortURL = substr($hash, $start, 6);
        $url = URL::where('code', $shortURL)->first();
        if($url){
            return $this->getFirstAvailableCode($hash, $start+6);
        }
        return $shortURL;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response($validator->errors(),400);
        }

        $url = URL::firstOrCreate(
            ['originalURL' => $request->url],
            ['originalURL' => $request->url,
             'code' => $this->getCode($request->url)
            ]
        );
        
        return new URLResource($url);
    }

    /**
     * Returns top 100 URLs
     */
    public function top()
    {
        $top = URL::orderBy('clicks', 'DESC')->get()->take(100);
        return $top;
    }
}
