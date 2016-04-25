<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    //
    protected $fillable = ['num', 'customer', 'price', 'status'];
    
    public function order()
    {
        $this->hasMany('App\Order');
    }
}
