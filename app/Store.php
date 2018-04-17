<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "stores";

    public $timestamps = false;

    public function order()
    {
        $this->hasMany('App\Order');
    }

    public function product()
    {
        $this->belongsToMany('App\Products','store_product')->withPivot('amount');
    }
}
