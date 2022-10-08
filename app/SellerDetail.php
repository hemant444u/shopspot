<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerDetail extends Model
{


    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'seller_id', 'products', 'pan_card','products_get_from' , 'company_type', 'store_name', 'store_mobile', 'store_logo','store_gst_in','store_email',
      'store_tan_no', 'store_address', 'store_address_proof', 'store_address_photo_proof', 'seller_first_name', 'seller_second_name', 'seller_email','seller_mobile',
      'seller_residental_address','seller_residental_city','seller_residental_state','seller_residental_pincode',
      'store_address_city','store_address_state','store_address_pincode',
       'seller_proof_of_address_type', 'seller_proof_of_address' , 'store_pickup_courier_pin_code','pick_up_address','signature_upload','pick_up_address',
       'pick_up_address_city','pick_up_address_state','pick_up_address_pincode',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        
    ];

  public function user(){
  	return $this->belongsTo(User::class, 'user_id');
  }

}
