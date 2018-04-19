<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function home()
    {
        $order_number = DB::table('orders')->count();
        $customer_number = DB::table('users')->count();
        $tea_sales = DB::select('call sale_by_year()');
        return view('admin.index',compact(['order_number','customer_number','tea_sales']));
        //print_r($tea_sales);
    }

    public function customers()
    {
        $users = User::all();
        return view('admin.customers')->with('users',$users);
    }

    public function order()
    {
        $orders = Order::all();
        $users = $orders->load('user');
        $products = $orders->load('product');
        return view('admin.order',compact('orders'));
    }

    public function awards()
    {
        return view('admin.awards');
    }

    public function upload($aggregation)
    {
        switch (@$aggregation) {
            case 'top_store':
                return view('admin.top_store');
                break;
            case 'diversity':
                return view('admin.diversity');
                break;
            default:
                redirect()->back();
        }
    }

    public function show(Request $request)
    {
        switch ($request->input('aggregation')) {
            case 'top_store':
                $month = $request->input('month');
                $year = $request->input('year');
                $results = DB::select('call monthly_top_stores(?,?)', array($month, $year));
                return view('admin.top_store2')->with('results', $results);
                break;
            case 'diversity':
                $category = $request->input('category');
                $city = $request->input('city');
                $results = DB::select('call store_product_diversity(?,?)', array($category,$city));
                return view('admin.diversity2')->with('results',$results);
            default:
                redirect()->back();
                break;
        }
    }
}
