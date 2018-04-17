<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Products extends Model
{
    use Searchable;
    //table
    protected $table = 'products';

    //disable time record
    public $timestamps = false;

    ///return detials of products
    public function product_detail()
    {
    	return $this->hasMany('App\ProductDetail','product_id');
    }

    public function store()
    {
        return $this->belongsToMany('App\Store','store_product');
    }

    public function order()
    {
        return $this->belongsToMany('App\Order','order_detail');
    }

    public function cart()
    {
        return $this->belongsToMany('App\Cart','cart_product');
    }
}
