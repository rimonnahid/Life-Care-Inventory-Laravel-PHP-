<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;
use App\Product\Category;
use App\Supplier;
use App\Orderdetail;
use App\Pv;
class Product extends Model
{
    protected $fillable = [
    	'category_id', 'supplier_id', 'name', 'size', 'quantity', 'pv', 'route', 'buy_price', 'selling_price', 'buy_date', 'expire_date', 'details', 'photo_1', 'photo_2', 'photo_3'
    ];

    public function Category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function Pv()
    {
        return $this->hasMany(Pv::class);
    }
    public function Orderdetail()
    {
        return $this->hasMany(Orderdetail::class);
    }
}
