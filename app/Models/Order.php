<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function shipping_details()
    {
    	$shipping_address = array();
    	return $shipping_address = json_decode($this->shipping_address);
    }

    public function seller()
    {
    	$shipping_address = array();
    	return $shipping_address = json_decode($this->shipping_address);
    }
}
