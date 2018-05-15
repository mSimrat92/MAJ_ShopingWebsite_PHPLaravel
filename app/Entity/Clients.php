<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = ['user_name', 'email', 'date_of_birth', 'address', 'province', 'country', 'contact_no', 'profile_img_url'];

    public function orders()
    {
        return $this->hasMany( 'App\Order\Order' );
    }
}
