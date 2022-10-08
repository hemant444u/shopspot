<!DOCTYPE html>
<html>
<head>
  <title>Sample Label Download</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  
  <style>
    .wrapper{height: 1000px !important;}
    .row {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin-right: -15px;
      margin-left: -15px;
      position: relative;
    }
    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
        width: 100%;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }
    .col-md-6{
      flex: 0 0 50%;
      max-width: 50%;
    }
    .right{
      margin-left: 50%;
      position: absolute;
    }
    p{font-size: 12px;}
    .col-md-12{
      flex: 0 0 100%;
      min-width: 100%;
    }
    .text-center{text-align: center}
    .heading{font-size: 40px;color:red;display: flex;}

</style>
</head>
<body>
  @forelse($orders as $order)
  <section class="wrapper">
                      <div class="row">
                        <div class="col-md-12">
                          <h3 class="text-center heading">Shopspot</h3>
                          <hr>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 left"> 
                          <p>Product Name : {{$order->product->name}}</p>
                          <p>Variation : {{$order->variation}}</p>
                          <p>Item Id : PRO{{$order->product_id}}</p>
                          <p>Quantity : {{$order->quantity}}</p>
                          <p>Price : {{$order->price}}</p>
                          <p>Tax : {{$order->tax}}</p>
                          <p><b>MRP : Rs {{$order->order->grand_total}}</b></p>
                          <p>Seller Name : {{$order->seller->user->name}}</p>
                          <p>Seller Email : {{$order->seller->user->email}}</p>
                          <p>Seller Phone : {{$order->seller->user->phone}}</p>
                          @forelse($order->order->shipping_details() as $key => $val)
                          <p>Buyer {{$key}} : {{$val}}</p>
                          @empty
                          @endforelse
                        </div>
                        <div class="col-md-6 right">
                          <p>Order Id : {{$order->order_id}}</p>
                          <p>Payment Type : {{$order->order->payment_type}}</p>
                          <p>Payment Status : {{$order->order->payment_status}}</p>
                          <p>Shipping Type : {{$order->shipping_type}}</p>
                          <p>
                          <?php $data = 'Order Id : ' .$order->order_id
                                        .' Product Name : ' .$order->product->name
                                        .' Item Id : ' .$order->product_id
                                        .' Price : Rs ' .$order->price
                                        .' Quantity : ' .$order->quantity
                                        .' Tax : ' .$order->tax
                                        .' MRP : Rs ' .$order->order->grand_total


                           ?>
                          {!! DNS2D::getBarcodeHTML($data,'QRCODE',8.2,8.2) !!}
                          </p>
                          <p>{!! DNS1D::getBarcodeHTML('Shopspot.in', 'C39',1.8,20) !!}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                      </div>

  </section>
  @empty
  @endforelse
</body>
</html>