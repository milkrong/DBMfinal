<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Cart;
use App\CartItem;
use App\Order;
use App\OrderItem;
use App\User;


class CheckoutController extends Controller
{

    /**
     * CheckoutController constructor.
     * return void
     */
    public function __construct()
	{
		$this->middleware('auth');
	}

    /**
     *Create an new order
     * return view
     */
    public function create()
    {
        $order = Order::where('user_id', Auth::user()->id)->first();
        if(!$order)
        {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->save();
        }

        return redirect('/order/1');
    }

    /**
     * Show order processing pages
     * @param $step
     * @return view
     */
    public function show($step)
    {
    	switch ($step) {
    		case '1':
    			$users = User::where('id',Auth::user()->id)->first();
    			return view('checkout1')->with('users', $users);
    			//personal info page
    			break;
            case '2':
                $users = User::where('id',Auth::user()->id)->first();
                $zip = Order::where('user_id',Auth::user()->id)->first()->zip;
                $stores = Store::where('zip', $zip)->get();
                if(!$stores){
                    redirect('order/1')->with('message','No stores in your area!');
                }
                //echo $stores;
                return view('checkout2', compact('users','stores'));
                break;
    		case '3':
    			return view('checkout3');
    			//payment info page
    			break;
    		case '4':
    			$cart = Cart::where('user_id',Auth::user()->id)->first();
    			$items = $cart->CartItem;
    			return view('checkout4')->with('items',$items);
    			//confirmation page
    			break;
    		default:
    			return view('error.404');
    			break;
    	}
    }

    public function update_store(Request $request)
    {
        $store_id = Store::where('store_name', $request->input('storename'))->first()->store_id;
        Order::where('user_id', Auth::user()->id)->update(
            [
                'store_id' => $store_id,
            ]
        );
        return redirect('order/3');
    }

    public function update_bill(Request $request)
    {
        if($request->input('email')) {
            User::where('id', Auth::user()->id)->update(
                [
                    'email' => $request->input('email'),
                ]
            );
        }
        Order::where('user_id', Auth::user()->id)->update(
            [
                'zip' => $request->input('zip'),
            ]
        );

        return redirect('order/2');
    }

    public function update_payment(Request $request)
    {
        Order::where('user_id', Auth::user()->id)->update(
            [
                'pay_method' => $request->input('payment'),
            ]
        );

        return redirect('order/4');
    }

    public function place(Request $request)
    {
        $order = Order::where('user_id',Auth::user()->id)->first();
        $orderItem = $order->OrderItem;
        OrderItem::where('order_id', $order_id)->update(
            [
                'product_id' => $request->input('product_id'),
                'amount' => $request->input('quantity'),
            ]
        );

        return $order_id;
    }
}
