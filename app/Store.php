<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "stores";

    public $timestamps = false;

    public function storeItem()
    {
        $this->hasMany('App\StoreItem');
    }
}
