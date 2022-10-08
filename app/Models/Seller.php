<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Seller extends Model
{
    protected $fillable = ['admin_to_pay'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function payment_date()
    {
        $today = date('d');
        if($this->seller_type == 'Stone'){
            $date = 1;
            if($today > 15){
                $date = 15;
            }
        }
    }
    
    public function payment_month()
    {
        $month = date(m);
        if($this->seller_type == 'Stone'){
            $month = $month + 1;
            if($today > 15){
                $date = 15;
            }
        }
    }
}
