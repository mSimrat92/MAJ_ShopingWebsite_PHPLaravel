<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo( 'App\Product\Category' );
    }

    public function brands()
    {
        return $this->hasMany( 'App\Product\Brand' );
    }


    public function items_subcategory()
    {
        return $this->hasMany( 'App\Product\Item' );
    }
}
