<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\OrderDetail;
use Barryvdh\DomPDF\Facade as PDF;

class OrderController extends Controller
{
	public function index()
	{
		$orders = Auth::User()->seller->order_details;
		$pending_labels = $orders->where('delivery_status','on_delivery');
		$pending_rtd = $orders->where('delivery_status','pending-rtd');
		$pending_handover = $orders->where('delivery_status','pending-handover');
		$in_transit = $orders->where('delivery_status','in-transit');
		$pending_services = $orders->where('delivery_status','pending-sevice');
		$in_last_30_days = $orders->where('delivery_status','delivered');
		$upcoming = $orders->whereIn('delivery_status',['on_review','pending']);

		$page = 'pending-labels';
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		if($page == 'pending-labels'){
			$orders = $pending_labels;
		}
		if($page == 'pending-rtd'){
			$orders = $pending_rtd;
		}
		if($page == 'pending-handover'){
			$orders = $pending_handover;
		}
		if($page == 'in-transit'){
			$orders = $in_transit;
		}
		if($page == 'pending-services'){
			$orders = $pending_services;
		}
		if($page == 'in-last-30-days'){
			$orders = $in_last_30_days;
		}
		if($page == 'upcoming'){
			$orders = $upcoming;
		}
		return view('frontend.seller.seller-details.order',compact('page','orders','pending_labels','pending_rtd','pending_handover','pending_services','in_last_30_days','upcoming'));
	}

	public function load_confirm_generate_labels(Request $request)
	{
		$page = $request->page;
		$pending_labels = OrderDetail::whereIn('id',$request->id)->get();
		return view('frontend.seller.seller-details.load_confirm_generate_labels',compact('pending_labels','page'));
	}

	public function change_status(Request $request)
	{
		$orders = OrderDetail::whereIn('id',$request->id)->get();
		foreach ($orders as $order) {
			$order->delivery_status = $request->status;
			$order->save();
		}
	}
	
	public function download_barcode()
    {
        $id = $_GET['id'];
        $myArray = explode(',', $id);
        $orders = OrderDetail::whereIn('id',$myArray)->get();
        $pdf = PDF::loadView('frontend.seller.seller-details.download_barcode', compact('orders'));
        return $pdf->download('label.pdf');
        return view('frontend.seller.seller-details.download_barcode',compact('orders'));
    }
    
    public function download_order_list()
    {
        $orders = Auth::User()->seller->order_details;
        $pdf = PDF::loadView('frontend.seller.seller-details.download_order_list', compact('orders'));
        return $pdf->download('order_list.pdf');
        return view('frontend.seller.seller-details.download_order_list',compact('orders'));
    }
    
    public function download_manifest()
    {
        $orders = Auth::User()->seller->order_details->where('delivery_status','pending-handover');
        $pdf = PDF::loadView('frontend.seller.seller-details.download_manifest', compact('orders'));
        return $pdf->download('manifest.pdf');
        return view('frontend.seller.seller-details.download_manifest',compact('orders'));
    }
    

}