<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name','status_type'];

    public function orders()
    {
        return $this->hasMany( 'App\Order\Order' );
    }

    public function ordersdetails()
    {
        return $this->hasMany( 'App\Order\OrderDetail' );
    }

    public function invoices()
    {
        return $this->hasMany( 'App\Order\Invoice' );
    }
}
