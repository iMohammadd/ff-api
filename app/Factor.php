<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Factor extends Model
{
    //
    protected $fillable = ['num', 'customer', 'price', 'status'];
    
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
