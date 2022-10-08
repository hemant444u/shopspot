<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'seller_id','amount', 'payment_details', 'payment_method', 'txn_code'
      ];
}
