<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }


    public function productVariantPrice()
    {
        return $this->hasMany(ProductVariantPrice::class);
    }


}
