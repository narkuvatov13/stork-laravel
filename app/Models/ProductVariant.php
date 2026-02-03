<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    //

    protected $fillable = [
        'product_id',
        'price',
        'discounted_price',
        'unit',
        'weight',
        'barcode',
        'brand',
        'sku',
        'is_active',
    ];
    /**
Category (iç içe)
 └── Product
      └── ProductVariant
           └── (Option / Value)


     */


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
