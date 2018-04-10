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

    public function cartItem()
    {
    	return $this->hasMany('App\cartItem');
    }
}
