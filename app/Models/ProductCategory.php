<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'category_product';
    protected $fillable = ['category_name', 'business_id', 'created_at', 'updated_at'];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
