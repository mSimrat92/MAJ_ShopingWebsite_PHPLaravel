<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id', 'subcategory_id', 'brand_id', 'suppliers_id', 'title', 'description', 'details', 'quantity', 'selling_price', 'discount_percentage'];

    public function itemImages()
    {
        return $this->hasMany( 'App\Product\ItemImages' );
    }

    public function category()
    {
        return $this->belongsTo( 'App\Product\Category' );
    }

    public function subcategory()
    {
        return $this->belongsTo( 'App\Product\SubCategory' );
    }

    public function brand()
    {
        return $this->belongsTo( 'App\Product\Brand' );
    }

    public function supplier()
    {
        return $this->belongsTo( 'App\Entity\Suppliers' );
    }

    public function order_details()
    {
        return $this->hasMany( 'App\Order\OrderDetail' );
    }
}
