<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function sub_Categories()
    {
        return $this->hasMany( 'App\Product\SubCategory' );
    }

    public function brands()
    {
        return $this->hasMany( 'App\Product\Brand' );
    }

    public function items_category()
    {
        return $this->hasMany( 'App\Product\Item' );
    }
}
