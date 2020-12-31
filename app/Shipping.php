<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Shipping extends Model
{
    protected $guarded = [];

    public function Order ()
    {
    	return $this->belongsTo(Order::class);
    }
}
