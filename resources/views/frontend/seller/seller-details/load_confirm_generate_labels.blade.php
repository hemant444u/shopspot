<style>
	.pull-right{float:right}
	.border{border: 1px solid #eee; padding: 5px;}
	.value{color:green;}
</style>
<hr>
<div class="row">
	<div class="col-md-12">
		<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#confirmProcessModal">
		{{$page == 'pending-labels' ? 'Process Label' : 'Reprint Label'}}</button>
		<a href="{{url('seller/order')}}" class="btn btn-sm btn-default pull-right">Go Back</a>
	</div>
</div>
<hr>
<?php $id = ''; ?>

@forelse($pending_labels as $order)
<div class="row">
	<div class="col-md-12">
		<p>
			<span class="border">Order Id</span>
			<span class="border value">{{$order->order->code}}</span>
		</p>
	</div>
	<div class="col-md-12">
		<p>Please Enter The following details</p>
	</div>
	<div class="col-md-2">
		<label>Length (In cm)</label>
		<input type="text" class="form-control" name="length" value="">
	</div>
	<div class="col-md-2">
		<label>Breadth (In cm)</label>
		<input type="text" class="form-control" name="length" value="">
	</div>
	<div class="col-md-2">
		<label>Height (In cm)</label>
		<input type="text" class="form-control" name="length" value="">
	</div>
	<div class="col-md-2">
		<label>Weight (In kg)</label>
		<input type="text" class="form-control" name="length" value="">
	</div>
	<div class="col-md-2 mb-2">
		<button class="btn btn-sm btn-success mt-3">Update</button>
	</div>
</div>

<div class="row mt-3">
	<div class="col-md-1">
		<img src="{{asset($order->product ? $order->product->thumbnail_img : '/')}}" width="100%" height="auto">
	</div>
	<div class="col-md-3">
		<a href="#">{{$order->product ? $order->product->name : 'N/A'}}</a>
	</div>
	<div class="col-md-3">
		<p>SKU : {{$order->product ? $order->product->sku : 'N/A'}}</p>
		<p>FSN : N/A</p>
	</div>
	<div class="col-md-3">
		<p>Item Id : {{$order->product_id}}</p>
		<p>HSN : N/A</p>
	</div>
	<hr>
	<div class="col-md-12 mt-3 mb-5">
		<table class="table table-bordered">
			<thead>
				<th colspan="2">Invoice & Tax Breakup</th>
			</thead>
			<tbody>
				<tr>
					<td>Price</td>
					<td>{{$order->price}}</td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td>{{$order->quantity}}</td>
				</tr>
				<tr>
					<td>Tax</td>
					<td>{{$order->tax}}</td>
				</tr>
				<tr>
					<td>Shippping Cost</td>
					<td>{{$order->shipping_cost}}</td>
				</tr>
				<tr>
					<td>Total</td>
					<td>{{$order->order ? $order->order->grand_total : 'N/A'}}</td>
				</tr>
				<tr>
					<td>Payment Status</td>
					<td>{{$order->payment_status}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<?php $id = $id .','.$order->id ?>

@empty

@endforelse



<!-- Modal -->
<div class="modal fade" id="confirmProcessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Orders Processing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you want to generate labels ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary confirm-process">Confirm</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		var token = '{{csrf_token()}}';

		$(document).on('click','.confirm-process',function(){
			$('#confirmProcessModal').modal('toggle');
			var id = '{{$id}}';
			var selected_id = id.substr(1);
			var temp = new Array();
      		temp = selected_id.split(",");
			var url = "{{url('seller/order/change-status')}}";
			var barcode_url = "{{url('/seller/order/download-barcode')}}";
			var next_url = "{{url('seller/order?page=pending-rtd')}}";
			var status = 'pending-rtd';
	      	$.ajax({
	        	url: url,
	        	method: "POST",
	        	data: {id: temp,status:status,_token:token},
	        	success: function (data) {
	        		var win = window.open(barcode_url + '?id='+ temp, '_blank');
					if (win) {
					    win.focus();
					} else {
					    alert('Please allow popups for this website');
					}
	          		window.location.href = next_url;
	        	}
	      	});
		});
	});
</script>