<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class ItemImages extends Model
{
    protected $fillable = ['item_id', 'image_name'];

    public function item()
    {
        return $this->belongsTo( 'App\Product\Item' );
    }
}
