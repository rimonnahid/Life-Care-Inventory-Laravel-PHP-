<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\Orderdetail;
use App\Pv;

class Order extends Model
{
    protected $guarded = [];

    public function Customer ()
    {
        return $this->belongsTo(Customer::class);
    }

    public function Orderdetail ()
    {
        return $this->hasMany(Orderdetail::class);
    }

    public function Shipping ()
    {
        return $this->hasMany(Shipping::class);
    }

    public function Pv ()
    {
        return $this->hasMany(Pv::class);
    }

}
