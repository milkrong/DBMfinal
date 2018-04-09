<?php

namespace App\Http\Controllers;

use App\Products;
use App\ProductDetail;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getIndex($category)
    {
    	if ($category == 'all'){
    		$products = Products::paginate(9);
    	}
    	else
    	{
    		$products = Products::with('product_detail')->where('category', $category)->paginate(9);
    	}

    	return view('products_list')->with(compact('products','category'));
    }

    public function getDetail($id)
    {
    	$details = Products::with('product_detail')->where('id',$id)->get();

    	return view('product_detail')->with(compact('details'));
    	//echo $details[0]->product_detail;
    }
}
