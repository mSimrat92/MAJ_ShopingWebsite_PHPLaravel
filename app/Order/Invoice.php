<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    public function order()
    {
        return $this->belongsTo( 'App\Order\Order' );
    }

    public function status()
    {
        return $this->belongsTo( 'App\Order\Status' );
    }
}
