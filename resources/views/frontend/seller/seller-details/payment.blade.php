<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Open Sans"
      rel="stylesheet"
    />
    <title>payment</title>
    <style>
        .card{
            box-shadow: rgba(208, 208, 208, 0.5) 0px -1px 3px 0px;
border: 0;
        }
      .card-title {
        font-weight: 300;
      }
      .date-block {
        margin: 5px 0px 0px;
        padding: 8px 5px;
        background-color: rgb(252, 248, 227);
        border: 1px solid rgb(250, 242, 204);
        border-radius: 3px;
        vertical-align: top;
        font-size: 13px;
        text-align: center;
        color: rgb(71, 160, 251);
      }
      .desc-block {
        color: rgb(170, 170, 170);
        font-size: 12px;
        margin: 5px 0px 0px;
      }
      .label-info{
        color: rgb(0, 0, 0);
    font-size: 15px;
      }
      .row-total{
        font-weight: 600;
        width: 98%;
    border-top: 1px solid rgb(204, 204, 204);
      }
    </style>
  </head>
  <body>
    @extends('frontend.layouts.app')

    @section('content')
    
    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @include('frontend.inc.seller_side_nav')
                </div>
    
                <div class="col-lg-9">
				<div class="row">
                    <h2 class="heading heading-6 text-capitalize strong-600 mb-4">
                                    
                        Payment
						  
                    </h2>
					
                      <b> <a href="{{ route('home') }}" style="margin-left:1rem;">{{__('>Home')}}</a></b>
                                      <b> <a href="{{ route('dashboard') }}">{{__('>Dashboard')}}</a></b>        
                                    
                                   
                         </div>      
                               
                    <div class="row">
                       
                        <div class="col-md-6">
                         
                            <div class="card mb-3" style="max-width: 540px">
                                <div class="row no-gutters">
                                  <div class="col-md-12">
                                    <div class="card-body">
                                      <h5 class="card-title">Next Payment</h5>
                                      <div class="row">
                                        <div class="col-md-9">
                                          <p class="desc-block">
                                            Estimated value of next payment. This may change due to
                                            returns that come in before the next payout. This might be
                                            inclusive of amount shown as Last Payment on a payout day. It
                                            could take up to 24 hrs to get updated.
                                          </p>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="date-block">{{$next_payment_date}}</div>
                                        </div>
                                      </div>
                                      <div class="row justify-content-between p-3">
                                          <span class="label-info">Postpaid</span>
                                          <div class="sub-total">
                                              <a href="">₹0.00</a>
                                          </div>
                                      </div>
                                      <div class="row justify-content-between px-3">
                                          <span class="label-info">Prepaid</span>
                                          <div class="sub-total">
                                              <a href="">₹0.00</a>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="card-footer bg-white border-0 d-flex justify-content-center">
                                      <div class="row px-3 justify-content-between row-total pt-2">
                                          <span>Total</span>
                                          <div>
                                              0
                                          </div>
                                      </div>
                                  </div>
                                  </div>
                                </div>
                              </div>
                         </div>
 <div class="col-md-6">
    <div class="card mb-3" style="max-width: 540px">
        <div class="row no-gutters">
          <div class="col-md-12">
            <div class="card-body">
              <h5 class="card-title">Last Payment</h5>
              <div class="row">
                <div class="col-md-9">
                  <p class="desc-block">
                    These payments have been initiated and may take up to 48 hours to reflect in your bank account.
                  </p>
                </div>
                <div class="col-md-3">
                  <div class="date-block">{{$last_payment_date}}</div>
                </div>
              </div>
              <div class="row justify-content-between p-3">
                  <span class="label-info">Postpaid</span>
                  <div class="sub-total">
                      <a href="">₹0.00</a>
                  </div>
              </div>
              <div class="row justify-content-between px-3">
                  <span class="label-info">Prepaid</span>
                  <div class="sub-total">
                      <a href="">₹0.00</a>
                  </div>
              </div>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-center">
              <div class="row px-3 justify-content-between row-total pt-2">
                  <span>Total</span>
                  <div>
                      0
                  </div>
              </div>
          </div>
          </div>
        </div>
      </div>
 </div>
 <div class="col-md-6">
    <div class="card mb-3" style="max-width: 540px">
        <div class="row no-gutters">
          <div class="col-md-12">
            <div class="card-body">
              <h5 class="card-title">Total outstanding payments</h5>
              <div class="row">
                <div class="col-md-12">
                  <p class="desc-block">
                    Total amount you are to receive from Flipkart for dispatched orders. It includes the 'Next Payment' amount shown above.
                  </p>
                </div>
                {{-- <div class="col-md-3">
                  <div class="date-block">07 Sep</div>
                </div> --}}
              </div>
              <div class="row justify-content-between p-3">
                  <span class="label-info">Postpaid</span>
                  <div class="sub-total">
                      <a href="">₹ {{$orderDetails->where('delivery_status','delivered')->where('orders.payment_type','cash_on_delivery')->sum('price')}}</a>
                  </div>
              </div>
              <div class="row justify-content-between px-3">
                  <span class="label-info">Prepaid</span>
                  <div class="sub-total">
                      <a href="">₹ {{$orderDetails->where('delivery_status','delivered')->where('orders.payment_type','!=','cash_on_delivery')->sum('price')}}</a>
                  </div>
              </div>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-center">
              <div class="row px-3 justify-content-between row-total pt-2">
                  <span>Total</span>
                  <div>
                      ₹ {{$orderDetails->where('delivery_status','delivered')->sum('price')}}
                  </div>
              </div>
          </div>
          </div>
        </div>
      </div>
 </div>
 <div class="col-md-6">
    <div class="card mb-3" style="max-width: 540px">
        <div class="row no-gutters">
          <div class="col-md-12">
            <div class="card-body">
                <div class="row align-items-baseline justify-content-between px-3 row">
              <h5 class="card-title">Unbilled orders </h5>
              <a href="" style="font-size: 15px;">Download the new Orders report</a>
                </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="desc-block">
                    These are orders yet to be dispatched. Once dispatched, payments will be scheduled and they will reflect in 'Total Outstanding Payments' section.

                  </p>
                </div>
                {{-- <div class="col-md-3">
                  <div class="date-block">07 Sep</div>
                </div> --}}
              </div>
              <div class="row justify-content-between p-3">
                  <span class="label-info">No. of Orders</span>
                  <div class="sub-total">
                      {{$orderDetails->where('delivery_status','!=','delivered')->count()}}
                  </div>
              </div>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-center">
              <div class="row px-3 justify-content-between row-total pt-2">
                  <span>Total</span>
                  <div>
                      ₹ {{$orderDetails->where('delivery_status','!=','delivered')->sum('price')}}
                  </div>
              </div>
          </div>
          </div>
        </div>
      </div>
 </div>
                    </div>
   
    
</div>

</div>
</div>
</section>
@endsection
  </body>
</html>
