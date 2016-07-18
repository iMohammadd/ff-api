<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Factor extends \Eloquent
{
    //
    protected $fillable = ['user_id', 'num', 'customer', 'price', 'status'];

    protected $hidden = ['refId'];
    
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
