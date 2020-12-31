<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product\Product;

class Supplier extends Model
{
    protected $fillable = [
    	'name', 'email', 'phone', 'address', 'type', 'shopname', 'bank_name', 'bank_branch', 'account_name', 'account_number', 'city', 'photo'
    ];

    public function Product()
    {
    	return $this->hasMany(Product::class);
    }
}
