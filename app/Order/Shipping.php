<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{

    protected $fillable = ['order_id', 'clients_id', 'suppliers_id', 'shipping_date','shipped_through','shipping_refrence_no'];

    public function orders()
    {
        return $this->hasMany( 'App\Order\Order' );
    }
}
