<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //table
    protected $table = 'product_detail';

    public function product()
    {
    	return $this->belongsTo('App\Prducts','product_id');
    }
}
