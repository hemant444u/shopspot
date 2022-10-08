<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\OrderDetail;
use Barryvdh\DomPDF\Facade as PDF;

class PaymentController extends Controller
{
	public function index()
	{
	    $seller = Auth::User()->seller;
	    $today = date('d');
	    $m = date('m');
	    $months = array (1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec');
	    if($seller->seller_type == 'Stone'){
	        $next_payment_date = 1 .' '.$months[(int)$m + 1];
	        $last_payment_date = 15 .' '.$months[(int)$m];
	        if($today < 15){
	            $next_payment_date = 15 .' '.$months[(int)$m];
	            $last_payment_date = 1 .' '.$months[(int)$m];
	            if($today == 1){
	                $last_payment_date = 15 .' '.$months[(int)$m - 1];
	            }
	        }
	    }
	    $orderDetails = OrderDetail::where('seller_id',12)->with('order')->get();
	    return view('frontend.seller.seller-details.payment',compact('orderDetails','next_payment_date','last_payment_date'));
	}
	
	public function next_payment()
	{
	    return $seller = Auth::User();
	    
	}
    

}