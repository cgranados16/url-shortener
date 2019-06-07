<?php

namespace App\Http\Controllers;

use App\Models\URL;
use Validator;
use App\Http\Resources\URL as URLResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class URLController extends Controller
{
    private $rules = [
        'url' => 'required|url',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return URLResource::collection(URL::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response($validator->errors(),400);
        }
        $url = new URL();
        $url->url = $request->url;
        $url->code = $this->shortenURL($request->url);
        $url->save();
        return new URLResource($url);
    }

    public function shortenURL($longURL)
    {
        $hash = md5($longURL);
        return substr($hash, 0, 6);
    }

}
