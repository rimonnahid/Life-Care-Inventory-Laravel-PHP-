<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;
use App\Product\Product;

class Category extends Model
{
    protected $fillable = ['name','status'];

    public function Product()
    {
    	return $this->hasMany(Product::class);
    }
}
