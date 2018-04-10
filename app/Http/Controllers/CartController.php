<?php

namespace App\Http\Controllers;
use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function addItem ($productId, $quantity, $size){

    	if(Auth::check())
 		{
	        $cart = Cart::where('user_id',Auth::user()->id)->first();
	 
	        if(!$cart){
	            $cart =  new Cart();
	            $cart->user_id=Auth::user()->id;
	            $cart->save();
	        }
	        //echo $cart->cartItem;
			$items = $cart->cartItem;

	 		if(!$items)
	 		{
	 			$cartItem = new CartItem();
	 			$cartItem->product_id=$productId;
	        	$cartItem->cart_id= $cart->id;
	        	$cartItem->$quantity = $quantity;
	        	$cartItem->$size = $size;
	        	$cartItem->save();
	 		}
	        else
	        {
	        	//check if product already in cart
	        	$count = CartItem::where('product_id',$productId)->where('cart_id', $cart->id)->count();
	        	if($count)
	        	{
	        		$quantity += CartItem::where('product_id', $productId)->where('cart_id', $cart->id)->get()[0]->quantity;
	        		CartItem::where('product_id', $productId)->update(['quantity' => $quantity]);
	        	}
	        	else
	        	{
	        		CartItem::create(['cart_id' => $cart->id, 
	        			'product_id' => $productId, 
	        			'quantity' => $quantity, 'size' => $size]);
	        	}

        	}
			return redirect('/cart');
        }
        else
        {
        	return redirect('/');
        }
    }

    public function showCart()
    {
    	if (Auth::check())
    		{
    		$cart = Cart::where('user_id',Auth::user()->id)->first();
 
	        if(!$cart)
	        {
	            $cart =  new Cart();
	            $cart->user_id=Auth::user()->id;
	            $cart->save();
	        }
	 
	        $items = $cart->cartItem;
	        $total = $tax=$total_taxed=0;
	        foreach($items as $item)
	        {
	        	switch ($item->size)
	        	{
	        		case 'small':
	        			$total += $item->product->product_detail[2]->price * $item->quantity;
	        			break;
	        		case 'medium':
	        			$total += $item->product->product_detail[1]->price * $item->quantity;
	        			break;
	        		case 'large':
	        			$total += $item->product->product_detail[0]->price * $item->quantity;
	        			break;
	        		
	        		default:
	        			$total += $item->product->product_detail[0]->price * $item->quantity;
	        			break;
	        	}
        	}

        	$tax = 	round($total*0.07, 2);
        	$total_taxed = $total + $tax;
 
        	return view('cart',compact('items','total','tax','total_taxed'));
    	}
    	else
    	{
    		return redirect('/');
    	}
    	
    }

    public function removeItem($id){
 
        CartItem::destroy($id);
        return redirect('/cart');
    }
}
