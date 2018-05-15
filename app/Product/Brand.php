<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'category_id', 'subcategory_id'];

    public function category()
    {
        return $this->belongsTo( 'App\Product\Category' );
    }

    public function subcategory()
    {
        return $this->belongsTo( 'App\Product\SubCategory' );
    }

    public function items()
    {
        return $this->hasMany( 'App\Product\Item' );
    }
}
