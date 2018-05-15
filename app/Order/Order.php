<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['reference_number', 'clients_id', 'total', 'status_id'];

    public function status()
    {
        return $this->belongsTo( 'App\Order\Status' );
    }

    public function clients()
    {
        return $this->belongsTo( 'App\Entity\Clients' );
    }

    public function order_details()
    {
        return $this->hasMany( 'App\Order\OrderDetail' );
    }

    public function invoices()
    {
        return $this->hasMany( 'App\Order\Invoice' );
    }

    public function shipping(){
        return $this->belongsTo( 'App\Entity\Shipping' );
    }

}
