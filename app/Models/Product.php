<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['category_id', 'operator', 'price', 'sku', 'cost_price', 'stock', 'unit', 'product_name', 'business_id', 'created_at', 'updated_at'];

    public function CategoryProduct()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
