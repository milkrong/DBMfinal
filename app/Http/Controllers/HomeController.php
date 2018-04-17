<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //user auth check
    public function __constructor()
    {
    	$this->middleware('auth');
    }

    //home page
    public function index()
    {
    	return view('index');
    }

    public function about()
    {
        return view('about');
    }
}
