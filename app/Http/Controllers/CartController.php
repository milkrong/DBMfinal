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


	        $cart = Cart::where('user_id',Auth::user()->id)->first();
	 
	        if(!$cart){
	            $cart =  new Cart();
	            $cart->user_id=Auth::user()->id;
	            $cart->save();
	        }
	        //echo $cart->cartItem;
			$items = $cart->product;

	 		if(!$items)
	 		{
	 			$cartItem = new CartItem();
	 			$cartItem->product_id=$productId;
	        	$cartItem->cart_id= $cart->id;
	        	$cartItem->quantity = $quantity;
	        	$cartItem->size = $size;
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

    public function showCart()
    {
    		$cart = Cart::where('user_id',Auth::user()->id)->first();
 
	        if(!$cart)
	        {
	            $cart =  new Cart();
	            $cart->user_id=Auth::user()->id;
	            $cart->save();
	        }
	 
	        $items = $cart->product;
	        $total = $tax = $total_taxed=0;
	        foreach($items as $item)
	        {
	        	switch ($item->pivot->size)
	        	{
	        		case 'small':
	        			$total += $item->product_detail[2]->price * $item->pivot->quantity;
	        			break;
	        		case 'medium':
	        			$total += $item->product_detail[1]->price * $item->pivot->quantity;
	        			break;
	        		case 'large':
	        			$total += $item->product_detail[0]->price * $item->pivot->quantity;
	        			break;
	        		
	        		default:
	        			$total += $item->product_detail[0]->price * $item->pivot->quantity;
	        			break;
	        	}
        	}

        	$tax = 	round($total*0.07, 2);
        	$total_taxed = $total + $tax;
 
        	return view('cart',compact('items','total','tax','total_taxed'));
    }

    public function removeItem($id){
 
        CartItem::destroy($id);
        return redirect('/cart');
    }
}
