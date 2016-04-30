<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Factor;

class Order extends Model
{
    //
    protected $fillable = ['title'];

    public function factor()
    {
        return $this->belongsTo(Factor::class);
    }
}
