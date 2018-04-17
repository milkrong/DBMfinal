<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = "carts";

	public $timestamps = false;
	
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function product()
    {
    	return $this->belongsToMany('App\Products','cart_product',
            'cart_id','product_id')->withPivot('quantity','size');
    }
}
