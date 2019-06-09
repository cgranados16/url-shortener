<?php

namespace App\Http\Controllers;
use App\Models\URL;

class HomeController extends Controller
{
    public function index(){
        return view('home', ['history' => []]); 
    }

    public function top(){
        $top = URL::orderBy('clicks', 'DESC')->get()->take(100);
        return view('top', ['top' => $top]); 
    }
}
