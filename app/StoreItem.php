<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreItem extends Model
{
    protected $table = 'store_product';

    public $timestamps = false;

    public function store()
    {
        $this->belongsTo('App\Store');
    }
}
