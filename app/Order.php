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
        return $this->belongsTo('App\User');
    }

    public function OrderItem()
    {
        return $this->hasMany('App\OrderItem');
    }
}
