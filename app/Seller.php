<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'bank_name', 'bank_acc_name', 'bank_acc_no' , 'ifsc_code', 'paypal_email','seller_type', 'user_id', 'verification_status','verification_info',
      'cash_on_delivery_status','admin_to_pay', 'bank_routing_no', 'bank_payment_status','cheque'
  ];
  public function user(){
  	return $this->belongsTo(User::class);
  }

  // public function seller_details(){
  // 	return $this->belongsTo(SellerDetail::class);
  // }

  public function payments(){
  	return $this->hasMany(Payment::class);
  }

  public function order_details()
  {
    return $this->hasMany('App\OrderDetail');
  }
}
