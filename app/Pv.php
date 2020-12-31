<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product\Product;
use App\Customer;
use App\Orderdetail;

class Pv extends Model
{
    protected $guarded =[];

    public function Order ()
    {
        return $this->belongsTo(Order::class);
    }
    public function Product ()
    {
        return $this->belongsTo(Product::class);
    }
    public function Customer ()
    {
        return $this->belongsTo(Customer::class);
    }
    // public function Customer ()
    // {
    //     return $this->belongsToMany(Customer::class)->withTimestamps();
    // }
    public function Orderdetail ()
    {
        return $this->hasMany(Orderdetail::class);
    }

}
