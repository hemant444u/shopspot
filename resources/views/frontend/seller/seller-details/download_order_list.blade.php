<!DOCTYPE html>
<html>
<head>
  <title>Order List Download</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  
  <style>
  body{margin:0px;padding:0p;}
    .wrapper{width:auto;}
    .col-md-12{width:100%;}
    .col-md-8{width:50%;}
    .col-md-6{width:50%;}
    .col-md-4{width:33.33%;}
    .offset-md-4{margin-left:33.33%;width:33.33%;}
    .offset-md-6{margin-left:50%;width:50%}
    .offset-md-8{margin-left:75%;width:33.33%;}
    .table{width:100%;}
    .table-bordered{border:1px solid #eee;}
    .table-bordered td{font-size:14px;border-bottom:1px solid #eee !important;}

    p{font-size: 12px;}
    .col-md-12{
      flex: 0 0 100%;
      min-width: 100%;
    }
    .text-center{text-align: center}
    .text-red{color:red;}
    .heading{font-size: 40px;color:red;display: flex;}
    .checkbox{color:#fff;border:1px solid black;}

</style>
</head>
<body>
<section class="wrapper">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center heading">Shopspot</h3>
            <hr>
        </div>

        <div class="col-md-12">
            <table class="table table-bordered">

                <tbody>
                    <tr>
                        <td>S No</td>
                        <td>Order Id</td>
                        <td>Product Name</td>
                        <td>Buyer Details</td>
                        <td>Grand Total</td>
                        <td>Payment Status</td>
                        <td>Delivery Status</td>
                    </tr>
                    <?php $i = 0; ?>
                    @forelse($orders as $order)
                    <?php $i++; ?>
                    <tr>
                        <td><small>{{$i}}</small></td>
                        <td><small>{{$order->order->code}}</small></td>
                        <td><small>{{$order->product->name}}</small></td>
                        <td><small>
                            @if ($order->order->user != null)
                                    {{ $order->order->user->name }}
                                @else
                                    Guest ({{ $order->order->guest_id }})
                                @endif</small></td>
                        <td>Rs {{$order->order->grand_total}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td><small>{{$order->delivery_status}}</small></td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>
</body>
</html>