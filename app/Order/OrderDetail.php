<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order_id', 'suppliers_id', 'item_id', 'quantity', 'price', 'discount_percentage', 'status_id', 'expected_shipping_date', 'shipping_date'];

    public function order()
    {
        return $this->belongsTo( 'App\Order\Order' );
    }

    public function supplier()
    {
        return $this->belongsTo( 'App\Entity\Suppliers' );
    }

    public function item()
    {
        return $this->belongsTo( 'App\Product\Item' );
    }

    public function status()
    {
        return $this->belongsTo( 'App\Order\Status' );
    }
}
