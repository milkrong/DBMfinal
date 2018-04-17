<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const CREATED_AT = 'order_date';
    const UPDATED_AT = 'order_date';

    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function product()
    {
        return $this->belongsToMany('App\Products','order_detail',
            'order_id','product_id')->withPivot('amount');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
