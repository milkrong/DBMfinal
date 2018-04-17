<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function getIndex()
    {
        $stores = Store::paginate(9);

        return view('stores',compact('stores'));
    }
}
