<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Pv;

class Customer extends Model
{
    protected $fillable = [
    	'name', 'email', 'phone', 'gender', 'address', 'cus_id','shopname', 'bank_name', 'bank_branch', 'account_name', 'account_number', 'city', 'photo'
    ];

    public function Order ()
    {
        return $this->hasMany(Order::class);
    }
    public function Pv ()
    {
        return $this->hasMany(Pv::class);
    }
    // public function Pv ()
    // {
    //     return $this->belongsToMany(Pv::class)->withTimestamps();
    // }

    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d-m-y');
    // }

    // public function getUpdatedAtAttribute($date)
    // {
    //     return Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d-m-y');
    // }
}
