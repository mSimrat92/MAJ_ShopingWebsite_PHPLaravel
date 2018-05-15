<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $fillable = ['user_name', 'company_name', 'company_registration_no', 'description', 'email', 'address', 'province', 'country', 'contact_no', 'website_url', 'profile_img_url'];


    public function item()
    {
        return $this->hasMany( 'App\Product\Item' );
    }

    public function order_details()
    {
        return $this->hasMany( 'App\Order\OrderDetail' );
    }
}
