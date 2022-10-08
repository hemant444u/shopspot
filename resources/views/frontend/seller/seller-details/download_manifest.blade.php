<!DOCTYPE html>
<html>
<head>
  <title>Sample Label Download</title>
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
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <p><b>ORDERED THROUGH</b></p>
                            <P class="text-red">Shopspot</P>
                            <p>Company Address</p>
                        </td>
                        <td>
                            <p><b>Logistics Manifest</b></p>
                            <p><small>sub title</small></p>
                            <p></p>
                        </td>
                        <td>
                            <p>Document No : 12345</p>
                            <p>Total Shipment to Dispatch : 3</p>
                            <p>Total Shipment to Check : 0</p>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            <table class="table table-bordered">

                <tbody>
                    <tr>
                        <td>S No</td>
                        <td>Tracking Id</td>
                        <td>Forms Required</td>
                        <td>Order Id</td>
                        <td>RTS done on</td>
                        <td>Notes</td>
                    </tr>
                    <?php $i = 0; ?>
                    @forelse($orders as $order)
                    <?php $i++; ?>
                    <tr>
                        <td><small>{{$i}}</small></td>
                        <td><small>123</small></td>
                        <td><small></small></td>
                        <td><small>{{$order->order->code}}</small></td>
                        <td><small>11 june 2021 12:00 pm</small></td>
                        <td><small></small></td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <p class="text-center">-----------------------------------------------------------------</p>
            <p class="text-center"><b>TO BE FILLED BY LOGISTICS EXECUTIVE</b></p>
            <p class="text-center">-----------------------------------------------------------------</p>
        </div>
        <div class="col-md-12">
            <table class="table">
                <tbody>
                    <tr>
                        <td><small>Pickup in time</small></td>
                        <td>_______________________</td>
                        <td><small>Total items picked</small></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td><small>Pick Out time</small></td>
                        <td>_______________________</td>
                        <td><small>All shipments has shopspot packaging</small></td>
                        <td><span class="checkbox">Y</span> Yes &nbsp;  &nbsp; &nbsp;  
                            <span class="checkbox">N</span> No</td>
                    </tr>
                    <tr>
                        <td><small>FE Name</small></td>
                        <td>_______________________</td>
                        <td><small>Seller Name</small></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td><small>FE Signature</small></td>
                        <td>_______________________</td>
                        <td><small>Seller Signature</small></td>
                        <td>_______________________</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</section>
</body>
</html>