@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @include('frontend.inc.seller_side_nav')
                </div>

                <div class="col-lg-9">
                    <!-- Page title -->
                    <div class="page-title">
                        <div class="row align-items-center">
						
                         
							<div class="row">
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                    
                                    {{__('Dashboard')}}
                                </h2>
                          
                            
                                <div class="float-md-left">
                                   
                                      <b> <a href="{{ route('home') }}" style="margin-left:1rem;">{{__('>Home')}}</a></b>
                                      <b> <a href="{{ route('dashboard') }}">{{__('>Dashboard')}}</a></b>
                                   
                                
                                </div>
                                </div>
                            
                        </div>
                        </div>

                    <!-- dashboard content -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-upload"></i>
                                        <span class="d-block title heading-3 strong-400">{{ count(\App\Product::where('user_id', Auth::user()->id)->get()) }}</span>
                                        <span class="d-block sub-title">{{__('Products')}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-cart-plus"></i>
                                        <span class="d-block title heading-3 strong-400">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'delivered')->get()) }}</span>
                                        <span class="d-block sub-title">{{__('Total sale')}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="dashboard-widget text-center blue-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-dollar"></i>
                                        @php
                                            $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                                            $total = 0;
                                            foreach ($orderDetails as $key => $orderDetail) {
                                                if($orderDetail->order->payment_status == 'paid'){
                                                    $total += $orderDetail->price;
                                                }
                                            }
                                        @endphp
                                        <span class="d-block title heading-3 strong-400">{{ single_price($total) }}</span>
                                        <span class="d-block sub-title">{{__('Total earnings')}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="dashboard-widget text-center yellow-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-check-square-o"></i>
                                        <span class="d-block title heading-3 strong-400">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'delivered')->get()) }}</span>
                                        <span class="d-block sub-title">{{__('Successful orders')}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-box bg-white mt-4">
                                    <div class="form-box-title px-3 py-2 text-center">
                                        {{__('Orders')}}
                                    </div>
                                    <div class="form-box-content p-3">
                                        <table class="table mb-0 table-bordered" style="font-size:14px;">
                                            <tr>
                                                <td>{{__('Total orders')}}:</td>
                                                <td><strong class="heading-6">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->get()) }}</strong></td>
                                            </tr>
                                            <tr >
                                                <td>{{__('Pending orders')}}:</td>
                                                <td><strong class="heading-6">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'pending')->get()) }}</strong></td>
                                            </tr>
                                            <tr >
                                                <td>{{__('Cancelled orders')}}:</td>
                                                <td><strong class="heading-6">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'cancelled')->get()) }}</strong></td>
                                            </tr>
                                            <tr >
                                                <td>{{__('Successful orders')}}:</td>
                                                <td><strong class="heading-6">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'delivered')->get()) }}</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-box bg-white mt-4">
                                        <div class="form-box-title px-3 py-2 text-center">
                                            {{__('Products')}}
                                        </div>
                                        <div class="form-box-content p-3 category-widget">
                                            <ul class="clearfix">
                                                @foreach (\App\Category::all() as $key => $category)
                                                    @if(count($category->products->where('user_id', Auth::user()->id))>0)
                                                        <li><a>{{ __($category->name) }}<span>({{ count($category->products->where('user_id', Auth::user()->id)) }})</span></a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <div class="text-center">
                                                <a href="{{ route('seller.products.upload')}}" class="btn pt-3 pb-1">{{__('Add New Product')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card no-border mt-4">
                                    <div class="card-header py-3">
                                        <h4 class="mb-0 h6">Welcome</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                <div class="col-md-6">
                                <ul class="list-unstyled">
                                            <li>
                                    <div class="col heading-5 mb-2">Account details</div>
                                            </li>
                                        <ul class="list-unstyled">
                                            <li class="my-2"><div class="d-flex">
                                            @if(Auth::user()->email_verified_at != null || Auth::user()->email_verified_at != '')
                                            <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                                                <div class="ml-1">Email Verification</div>
                                            </div>
                                            @else
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="#ff0000" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                  </svg>
                                                <div class="ml-1">Email Verification</div>
                                                @endif
                                        </li>

                                        <li><div class="d-flex">
                                        @if(Auth::user()->is_verified != null || Auth::user()->is_verified != '')
                                        <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                                                <div class="ml-1">Phone Verification</div>
                                            </div>
                                            @else
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="#ff0000" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                  </svg>
                                                <div class="ml-1">Phone Verification</div>
                                                @endif
                                        </li>
                                           
                                        </ul>
                                    </ul>

                                        <ul class="list-unstyled">
                                            <li>
                                            <div class="col heading-5 mb-2">Business details</div>
                                        </li>
                                        <ul class="list-unstyled">
                                    <li class="my-2"><div class="d-flex">
                                            @if(\App\SellerDetail::where('user_id', Auth::user()->id)->first()->store_gst_in != null || \App\SellerDetail::where('user_id', Auth::user()->id)->first()->store_gst_in != '' )
                                           <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                                                <div class="ml-1">GSTIN</div>
                                            </div>
                                            @else
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="#ff0000" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                  </svg>
                                                <div class="ml-1">GSTIN</div>
                                                @endif
                                        </li>
                                        <li><div class="d-flex">
                                        @if(\App\SellerDetail::where('user_id', Auth::user()->id)->first()->store_tan_no != null || \App\SellerDetail::where('user_id', Auth::user()->id)->first()->store_tan_no != '')
                                        <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                                                <div class="ml-1">TAN</div>
                                            </div>
                                            @else
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="#ff0000" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                  </svg>
                                                <div class="ml-1">TAN</div>
                                                @endif
                                        </li>
                                       
                                            </ul>
                                        </ul>
                                
                                        <ul class="list-unstyled">
                                        <li>
                                            <div class="col heading-5 mb-2">Store details</div>
                                        </li>
                                        <ul class="list-unstyled">
                                        <li><div class="d-flex">
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="#ff0000" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg>
                                                <div class="ml-1">Store detail</div>
                                            </div>
                                        </li>
                                        </ul>
                                        </ul>
                                </div>
                                
                                <div class="col-md-6">
                                <ul class="list-unstyled">
                                            <li>
                                            <div class="col heading-5 mb-2">Bank details</div>
                                        </li>
                                        <ul class="list-unstyled">
                                            <li class="my-2"><div class="d-flex">
                                            @if(\App\Seller::where('user_id', Auth::user()->id)->first()->verification_status != null || \App\Seller::where('user_id', Auth::user()->id)->first()->verification_status != '' )
                                            <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                                                <div class="ml-1">Bank account verification</div>
                                            </div>
                                            @else
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="#ff0000" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                  </svg>
                                                <div class="ml-1">Bank account verification</div>
                                                @endif
                                        </li>
                                        <li><div class="d-flex">
                                        <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                                                <div class="ml-1">Cancelled cheque</div>
                                            </div>
                                        </li>
                                        
                                            </ul>
                                        </ul>
                                
                                
                                
                                
                                        <ul class="list-unstyled">
                                            <li>
                                            <div class="col heading-5 mb-2">Product details</div>
                                        </li>
                                        <ul class="list-unstyled">
                                            <li class="my-2"><div class="d-flex">
                                            @if (count(\App\Product::where('user_id', Auth::user()->id)->get()) > 0)
                                        <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                                                <div class="ml-1">Listing Created</div>
                                            </div>
                                            @else
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="#ff0000" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                  </svg>
                                                <div class="ml-1">Listing Created</div>
                                                @endif
                                        </li>
                                        <li><div class="d-flex">
                                        @if (count(\App\Product::where('user_id', Auth::user()->id)->get()) > 0)
                                        <div title="SUCCESS" class="sc-pRStN jTbOhh"><svg x="0" y="0" viewBox="0 0 24 24" width="20px"><g id="Page-1" stroke="none" stroke-width="1" fill="#27AC70" fill-rule="evenodd"><g id="All-Tickets/Seller-Details" transform="translate(-280.000000, -282.000000)"><g id="Group-2" transform="translate(280.000000, 273.000000)"><g id="Group"><g id="Progress-indicator"><g id="Group-4"><g id="Steps/status/Done" transform="translate(0.000000, 9.000000)"><g id="Done"><path d="M12,0 C18.6,0 24,5.4 24,12 C24,18.6 18.6,24 12,24 C5.4,24 0,18.6 0,12 C0,5.4 5.4,0 12,0 Z M12,2 C6.5,2 2,6.5 2,12 C2,17.5 6.5,22 12,22 C17.5,22 22,17.5 22,12 C22,6.5 17.5,2 12,2 Z M10,14 L16.1,8 L17.5,9.4 L10,16.8 L6,12.8 L7.4,11.4 L10,14 Z" id="Combined-Shape"></path></g></g></g></g></g></g></g></g></svg></div>
                                                <div class="ml-1">Product added</div>
                                            </div>
                                            @else
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="#ff0000" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                  </svg>
                                                <div class="ml-1">Product added</div>
                                                @endif
                                        </li>
                                        
                                            </ul>
                                        </ul>
                                </div>
                                
                                </div>
                                       
                                        </div>
                                    </div>
                            </div>


                           
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="bg-white mt-4 p-5 text-center">
                                    <div class="mb-3">
                                        @if(Auth::user()->seller->verification_status == 0)
                                            <img loading="lazy"  src="{{ asset('frontend/images/icons/non_verified.png') }}" alt="" width="130">
                                        @else
                                            <img loading="lazy"  src="{{ asset('frontend/images/icons/verified.png') }}" alt="" width="130">
                                        @endif
                                    </div>
                                    @if(Auth::user()->seller->verification_status == 0)
                                        <a href="{{ route('shop.verify') }}" class="btn btn-styled btn-base-1">{{__('Verify Now')}}</a>
                                    @endif
                                </div>
                            </div>
                          
                            <div class="col-md-4">
                                @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                                    <div class="form-box bg-white mt-4">
                                        <div class="form-box-title px-3 py-2 clearfix ">
                                            {{__('Purchased Package')}}
                                        </div>
                                        @php
                                            $seller_package = \App\SellerPackage::find(Auth::user()->seller->seller_package_id);
                                        @endphp
                                        <div class="form-box-content p-3">
                                            @if($seller_package != null)
                                                <div class="form-box-content p-2 category-widget text-center">
                                                    <center><img alt="Package Logo" src="{{ asset($seller_package->logo) }}" style="height:100px; width:90px;"></center>
                                                    <br>
                                                    <strong><p>{{__('Product Upload Remaining')}}: {{ Auth::user()->seller->remaining_uploads }} {{__('Times')}}</p></strong>
                                                    <strong><p>{{__('Digital Product Upload Remaining')}}: {{ Auth::user()->seller->remaining_digital_uploads }} {{__('Times')}}</p></strong>
                                                    <strong><p>{{__('Package Expires at')}}: {{ Auth::user()->seller->invalid_at }}</p></strong>
                                                    <strong><p><div class="name mb-0">{{__('Current Package')}}: {{ $seller_package->name }} <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span></div></p></strong>
                                                </div>
                                            @else
                                                <div class="form-box-content p-2 category-widget text-center">
                                                    <center><strong><p>{{__('Package Not Found')}}</p></strong></center>
                                                </div>
                                            @endif
                                            <div class="text-center">
                                                <a href="{{ route('seller_packages_list') }}" class="btn btn-styled btn-base-1 btn-outline btn-sm">{{__('Upgrade Package')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="bg-white mt-4 p-4 text-center">
                                    <div class="heading-4 strong-700">{{__('Shop')}}</div>
                                    <p>{{__('Manage & organize your shop')}}</p>
                                    <a href="{{ route('shops.index') }}" class="btn btn-styled btn-base-1 btn-outline btn-sm">{{__('Go to setting')}}</a>
                                </div>
                                <div class="bg-white mt-4 p-4 text-center">
                                    <div class="heading-4 strong-700">{{__('Payment')}}</div>
                                    <p>{{__('Configure your payment method')}}</p>
                                    <a href="{{ route('profile') }}" class="btn btn-styled btn-base-1 btn-outline btn-sm">{{__('Configure Now')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
