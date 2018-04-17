<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
	protected $table = "cart_product";
	protected $fillable = ['cart_id','product_id','quantity','size'];

	public $timestamps = false;
	
    public function cart()
    {
    	return $this->belongsTo('App\Cart');
    }

    public function product()
    {
    	return $this->belongsTo('App\Products');
    }
}
