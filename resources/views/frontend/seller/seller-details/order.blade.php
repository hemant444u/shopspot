
@extends('frontend.layouts.app')

@section('content')
<style>
    .list-inline-item:not(:last-child) {margin-right: 2.5rem;}

  #active-orders .active{color:green;}
  #active-orders a{color:#333;}
  .lebel{font-size: 10px;}
  .box{border: 1px solid grey;cursor:pointer;}
  .box .number{font-size: 10px;}
  .box .text{font-size: 8px;}
</style>
<section class="gry-bg py-4 profile">
    <div class="container-fluid">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-3 d-none d-lg-block">
                @include('frontend.inc.seller_side_nav')
            </div>
            <div class="col-lg-9">
              <!-- Page title -->
              <div class="page-title">
                <div class="row align-items-center">
                  <div class="col-md-6">
							      <div class="row">
                      <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                        {{__('Orders')}}
                      </h2>
								      <b> 
                        <a href="{{ route('home') }}" style="margin-left:1rem;">{{__('>Home')}}</a>
                      </b>
                      <b>
                        <a href="{{ route('dashboard') }}">{{__('>Dashboard')}}</a>
                      </b>        
                    </div>  
                  </div>
                </div>
              </div>

              <div class="card no-border mr-4">
                <div class="card-header py-2">
                  <div class="row align-items-center">
                    <div class="col-md-12 col-xl-12 ml-auto">
                      <form id="sort_orders" action="" method="GET">
                        <div class="row">
                          <div class="col-md-3">
                            <input type="text" class="form-control" id="search" name="search"  placeholder="Type Order & hit Enter">
                          </div>
                          <div class="col-md-3 ml-auto">
                            <select class="form-control mb-3 selectpicker" id="getActive">
                              <option value="active">Active Orders</option>
                              <option value="return">Returns</option>
                              <option value="cancelled">Cancellations</option>
                            </select>
                          </div>               
                        </div>
                      </form> 
                    </div>
                  </div>
                </div>

                <div class="card-body d-none" id="active-orders">
                  <div class="row mr-1">
                    <div class="col-md-5">
                      <p>Processing Orders</p>
                      <div class="row mr-1">
                          <div class="col-md-4 box">
                              <a href="{{url('seller/order?page=pending-labels')}}" class="{{$page == 'pending-labels' ? 'active' : ''}}">
                                <h3 class="number">{{$pending_labels->count()}}</h3>
                                <h3 class="text">Pending Labels</h3>
                              </a>
                          </div>
                          <div class="col-md-4 box">
                            <a href="{{url('seller/order?page=pending-rtd')}}" class="{{$page == 'pending-rtd' ? 'active' : ''}}">
                              <h3 class="number">{{$pending_rtd->count()}}</h3>
                              <h3 class="text">Pending RTD</h3>
                            </a>
                          </div>
                          <div class="col-md-4 box">
                            <a href="{{url('seller/order?page=pending-handover')}}" class="{{$page == 'pending-handover' ? 'active' : ''}}">
                              <h3 class="number">{{$pending_handover->count()}}</h3>
                              <h3 class="text">Pending Handover</h3>
                            </a>
                          </div>
                      </div>
                    </div>

                    <div class="col-md-3 label">
                      <p>Discard Orders</p>
                      <div class="row mr-1">
                          <div class="col-md-6 box">
                              <a href="{{url('seller/order?page=in-transit')}}" class="{{$page == 'in-transit' ? 'active' : ''}}">
                                <h3 class="number">{{$pending_handover->count()}}</h3>
                                <h3 class="text">In Transit</h3>
                              </a>
                          </div>
                          <div class="col-md-6 box">
                              <a href="{{url('seller/order?page=pending-services')}}" class="{{$page == 'pending-services' ? 'active' : ''}}">
                                <h3 class="number">{{$pending_services->count()}}</h3>
                                <h3 class="text">Pending Services</h3>
                              </a>
                          </div>
                      </div>
                    </div>

                    <div class="col-md-2 label">
                      <p>Compressed Oders</p>
                      <div class="row mr-1">
                          <div class="col-md-12 box">
                              <a href="{{url('seller/order?page=in-last-30-days')}}" class="{{$page == 'pending-services' ? 'active' : ''}}">
                                <h3 class="number">{{$in_last_30_days->count()}}</h3>
                                <h3 class="text">In last 30 days</h3>
                              </a>
                          </div>
                      </div>
                    </div>

                    <div class="col-md-2 label">
                      <p>Upcoming Orders</p>
                      <div class="row mt-1">
                        <div class="col-md-6 box">
                            <a href="{{url('seller/order?page=upcoming')}}" class="{{$page == 'upcoming' ? 'active' : ''}}">
                                <h3 class="number">{{$upcoming->count()}}</h3>
                                <h3 class="text">...</h3>
                            </a>
                          </div>
                      </div>
                    </div>

                  </div>

                  <div class="row mt-3 mb-3 row-generate">
                    <select class="mr-2">
                      <option>Bulk Action</option>
                    </select>
                    
                    <a href="{{url('seller/order/download-order-list')}}" class="btn btn-warning mr-2 download-order-list">Download Orders List</a>
                    
                    @if($page == 'pending-labels')
                    <button class="btn btn-danger mr-2 action cancel-order" data-toggle="modal" data-target="#cancelModal">Cancel Order</button>
                    <button class="btn btn-primary mr-2 action generate-labels">Generate Labels</button>
                    @endif
                    @if($page == 'pending-rtd')
                      <button class="btn btn-warning mr-2 action generate-labels">Reprint Label</button>
                      <button class="btn btn-primary mr-2 action mark-rtd" data-toggle="modal" data-target="#markRtdModal">Mark RTD</button>
                    @endif
                    @if($page == 'pending-handover')
                    <button class="btn btn-primary mr-2 action get-pickup-report">Get Pickup Report</button>
                    <button class="btn btn-primary mr-2 action proof-of-pickup">Proof of Pickup</button>
                    <a href="{{url('seller/order/download-manifest')}}" class="btn btn-primary mr-2 download-manifest">Download Manifest</a>
                    @endif
                  </div>

                  <table class="table table-hover table-responsive table-bordered table-orders" style="width:100%;">
                    <thead>
                      <th><input type="checkbox" value="123" class="defaultCheck"></th>
                      <th>Order id</th>
                      <th>Product Information</th>
                      <th>Buyer Details</th>
                      <th>Amount</th>
                      <th>SLA</th>
                      <!--<th>Order Tags</th>-->
                    </thead>
                    <tbody>
                      @forelse($orders as $order)
                      <tr>
                        <td><input type="checkbox" name="checkbox[]" value="{{$order->id}}" class="checkbox"></td>
                        <td>{{$order->order->code}}</td>
                        <td>
                            <img src="{{asset($order->product ? $order->product->thumbnail_img : '/')}}" style="width:36px;height:auto;">
                            {{$order->product ? $order->product->name : 'N/A'}}
                        </td>
                        <!--<td class="text-center">Item Id: {{$order->product_id}}</td>-->
                        <!--<td class="text-center">FSN: ASNKFe5432</td>-->
                        <td></td>
                        <td>{{$order->order->grand_total}}</td>
                        <td>10:00 am, OCT</td>
                        <!--<td>-</td>-->
                      </tr>
                      @empty
                      @endforelse
                    </tbody>
                  </table>
                  <div class="card-body" id="confirm-generate-labels"></div>
                </div>
                
                
                
                <!-- Returned Tab -->
                <div class="card-body d-none" id="return-orders">
                     <div class="row">
                      <div class="col-md-8">
                        <h5 class="text-primary strong-600">Foxy Urban Rakhi Gift My Sister Printed for Sister, Rakshbandhan gift for Sister, Birthday gift for sister Ceramic Mug</h5>
                      </div>
                      {{-- <div class="col-md-4">
                        <button class="btn btn-styled btn-base-1 btn-outline">Show Details</button>
                      </div> --}}
                     </div>
                     <div class="row">
                        <ul class="list-inline col">
                            <li class="list-inline-item"><span class="text-secondary">SKU:</span><span> FUMUGH013</span></li>
                            <li class="list-inline-item"><span class="text-secondary">Order Item ID:</span><span class="text-primary"> 9876543214576765</span></li>
                            <li class="list-inline-item"><span class="text-secondary">Buyer Name:</span> <span class="text-primary"> Vikas swami </span></li>
                            <li class="list-inline-item"><span class="text-secondary">SPF Status:</span> <span class="text-danger">CLIM REJECTED</span></li>
                          </ul>
                     </div>
                     <div class="row">
                         <div class="col-md-2">
                             <ul class="list-unstyled">
                           <li class="text-secondary">Price</li>
                           <li>330</li>
                             </ul>
                         </div>
                         <div class="col-md-2">
                            <ul class="list-unstyled">
                                <li class="text-secondary">Return Details</li>
                                <li>Return</li>
                                <li class="d-flex">ID: <span> 10298765456782876</span></li>
                                <li><span class="text-primary">Aug 15, 2020</span></li>
                                  </ul>
                         </div>
                         <div class="col-md-2">
                            <ul class="list-unstyled">
                                <li class="text-secondary">Type</li>
                                <li>Customer Return</li>
                                <li class="d-flex">Expect Physical Delivery</li>
                                <li><span class="text-secondary">Refund</span></li>
                                  </ul>
                         </div>
                         <div class="col-md-2">
                            <ul class="list-unstyled">
                                <li class="text-secondary">Reason</li>
                                <li>Defective Product</li>
                                <li><span class="text-primary">Buyer Comment</span></li>
                            </ul>
                         </div>
                         <div class="col-md-2">
                            <ul class="list-unstyled">
                                <li class="text-secondary">Tracking Detail</li>
                                <li><span>Return Delivered On:</span> Sep 23, 2020</li>
                                <li class="d-flex">ID: <span class="text-primary"> 10298765456782876</span></li>
                                <li class="d-flex">Logistic Partner name <span> Ekart</span></li>
                                <li>Logistics</li>

                            </ul>
                         </div>
                     </div>
                </div>


                <!-- Canceled Tab -->
                <div class="card-body d-none" id="cancelled-orders">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-sm table-hover table-bordered table-responsive table-orders">
                        <thead>
                          <th>Order id</th>
                          <th colspan="3">Product Information</th>
                          <th>Buyer Details</th>
                          <th>Amount</th>
                          <th>SLA/Dispatch by</th>
                          <th>Order Tags</th>
                        </thead>
                        <tbody>
                          @forelse(Auth::User()->seller->order_details->where('status', 'cancelled') as $order)
                          <tr>
                            <td>{{$order->order->code}}</td>
                            <td>{{$order->product ? $order->product->name : 'N/A'}}</td>
                            <td class="text-center">Item Id: {{$order->product_id}}</td>
                            <td class="text-center">FSN: ASNKFe5432</td>
                            <td></td>
                            <td>$24</td>
                            <td>10:00 am, OCT</td>
                            <td>-</td>
                          </tr>
                          @empty
                          @endforelse
                        </tbody>
                      </table>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="pagination-wrapper py-4">
                    <ul class="pagination justify-content-end">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- RTD Modal -->
<div class="modal fade" id="markRtdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mark Orders as RTD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure, you want to mark the selected orders as RTD. This action can not be reversed.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary confirm-rtd">Mark RTD</button>
      </div>
    </div>
  </div>
</div>

<!-- Cancel Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure, you want to cancel selected orders. This action can not be reversed.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary confirm-cancel">Confirm Cancel</button>
      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(()=>{

  $('#getActive').change(()=>{
      changeActivity();
  });
  var selected = '';
  $('.defaultCheck').checked = false;
  
});

const changeActivity = () =>{
    const $get = $('#getActive').val();
 if($get == 'active'){
     $('#active-orders').removeClass('d-none');
     $('#return-orders').addClass('d-none');
     $('#cancelled-orders').addClass('d-none');
 }else if($get == 'return'){
    $('#return-orders').removeClass('d-none');
    $('#active-orders').addClass('d-none');
    $('#cancelled-orders').addClass('d-none');
 }
 else{
    $('#return-orders').addClass('d-none');
    $('#active-orders').addClass('d-none');
    $('#cancelled-orders').removeClass('d-none');
 }
}
changeActivity();

  $(document).ready(function(){
    var selected_id = '';
    var token = '{{csrf_token()}}';

    $('.checkbox:checkbox').each(function() {
      this.checked = false;
    });
    $('.defaultCheck').checked = false;
    
    $('.action').attr('disabled',true);

    $('.defaultCheck').click(function(event) {   
      selected_id = '';
      if(this.checked) {
            // Iterate each checkbox
            $('.checkbox:checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkbox:checkbox').each(function() {
                this.checked = false;
            });
        }
        $('input[name="checkbox[]"]:checked').each(function() {
           selected_id = selected_id + ',' + this.value;
        });
        selected_id = selected_id.substr(1);

        if(selected_id == ''){
          $('.action').attr('disabled',true);

        }else{
          $('.action').attr('disabled',false);
        }
    });

    $('.checkbox').click(function(event) {
      selected_id = '';
      $('input[name="checkbox[]"]:checked').each(function() {
        selected_id = selected_id + ',' + this.value;
      });
        selected_id = selected_id.substr(1);

        if(selected_id == ''){
          $('.action').attr('disabled',true);
        }else{
          $('.action').attr('disabled',false);
        }
    });
    $(document).on('click','.generate-labels',function() {
      $('.row-generate').hide();
      $('.table-orders').hide();
      var page = "{{$page}}";
      var temp = new Array();
      temp = selected_id.split(",");
      var url = "{{url('/seller/order/load-confirm-generate-labels')}}";
      $.ajax({
        url: url,
        method: "POST",
        data: {id: temp,page: page,_token:token},
        success: function (data) {
          $('#confirm-generate-labels').html(data);
        }
      });
    });

    $(document).on('click','.confirm-rtd',function(){
      $('#markRtdModal').modal('toggle');
      var temp = new Array();
      temp = selected_id.split(",");
      var url = "{{url('seller/order/change-status')}}";
      var next_url = "{{url('seller/order?page=pending-handover')}}";
      var status = 'pending-handover';
          $.ajax({
            url: url,
            method: "POST",
            data: {id: temp,status:status,_token:token},
            success: function (data) {
              window.location.href = next_url;
            }  
          });
    });
    $(document).on('click','.confirm-cancel',function(){
      $('#cancelModal').modal('toggle');
      var temp = new Array();
      temp = selected_id.split(",");
      var url = "{{url('seller/order/change-status')}}";
      var next_url = "{{url('seller/order?page=pending-labels')}}";
      var status = 'cancelled';
          $.ajax({
            url: url,
            method: "POST",
            data: {id: temp,status:status,_token:token},
            success: function (data) {
              window.location.href = next_url;
            }  
          });
    });

  });
</script>
@endsection