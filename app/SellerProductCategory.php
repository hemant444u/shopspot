<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerProductCategory extends Model
{


    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'name'
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
      
    ];

  public function user(){
  	return $this->belongsTo(User::class);
  }

}
