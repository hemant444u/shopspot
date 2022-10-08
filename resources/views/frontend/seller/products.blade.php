@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @include('frontend.inc.seller_side_nav')
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                <div class="row">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{__('Products')}}
                                    </h2>
									<b> <a href="{{ route('home') }}" style="margin-left:1rem;">{{__('>Home')}}</a></b>
                                      <b> <a href="{{ route('dashboard') }}">{{__('>Dashboard')}}</a></b>  
                                </div>
                                </div>
                               
                            </div>
                        </div>

                        <div class="row">
                            @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center green-widget text-white mt-4 c-pointer">
                                    <i class="la la-dropbox"></i>
                                    <span class="d-block title heading-3 strong-400">{{ max(0, Auth::user()->seller->remaining_uploads) }}</span>
                                    <span class="d-block sub-title">{{ __('Remaining Uploads') }}</span>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4 mx-auto">
                                <a class="dashboard-widget text-center plus-widget mt-4 d-block" href="{{ route('seller.products.upload')}}">
                                    <i class="la la-plus"></i>
                                    <span class="d-block title heading-6 strong-400 c-base-1">{{ __('Add New Product') }}</span>
                                </a>
                            </div>
                            @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                            @php
                                $seller_package = \App\SellerPackage::find(Auth::user()->seller->seller_package_id);
                            @endphp
                            <div class="col-md-4">
                                <a href="{{ route('seller_packages_list') }}" class="dashboard-widget text-center red-widget text-white mt-4 d-block">
                                    @if($seller_package != null)
                                    <img src="{{ asset($seller_package->logo) }}" height="44" class="img-fit mw-100 mx-auto mb-1">
                                    <span class="d-block sub-title mb-2">{{__('Current Package')}}: {{ $seller_package->name }}</span>
                                    @else
                                        <i class="la la-frown-o mb-1"></i>
                                        <div class="d-block sub-title mb-2">{{__('No Package Found')}}</div>
                                    @endif
                                    <div class="btn btn-styled btn-white btn-outline py-1">{{__('Upgrade Package')}}</div>
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="card no-border mt-4">
                            <div class="card-header py-2">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-xl-3">
                                        <h6 class="mb-0">All Products</h6>
                                    </div>
                                    <div class="col-md-6 col-xl-3 ml-auto">
                                        <form class="" action="" method="GET">
                                            <input type="text" class="form-control" id="search" name="search" @isset($search) value="{{ $search }}" @endisset placeholder="Search product">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="width: 100%;">
                                <table class="table table-sm table-hover table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Category')}}</th>
                                            <th>{{__('Brand')}}</th>
                                            <th>{{__('Colors')}}</th>
                                            <th>{{__('Current Qty')}}</th>
                                            <th>{{__('Base Price')}}</th>
                                            <th>{{__('SKU')}}</th>
                                            <!--<th>{{__('Published')}}</th>-->
                                            <!--<th>{{__('Featured')}}</th>-->
                                            <th>{{__('Options')}}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>{{ ($key+1) + ($products->currentPage() - 1)*$products->perPage() }}</td>
                                                <td><a href="{{ route('product', $product->slug) }}" target="_blank">{{ __($product->name) }}</a></td>
                                                
                                                
                                                    <td>{{ $product->cat_name }}</td>
                                                    <td>{{ $product->b_name }}</td>
                                                  
                                                
                                                    <td > <ul class="list-inline checkbox-color checkbox-color-circle mb-0">
                                    @foreach ($all_colors as $key => $color)
                                        <li>
                                            <input type="radio" id="color-{{ $key }}" name="color" value="{{ $color }}" @if(isset($selected_color) && $selected_color == $color) checked @endif onchange="filter()">
                                            <label style="background: {{ $color }};" for="color-{{ $key }}" data-toggle="tooltip" data-original-title="{{ \App\Color::where('code', $color)->first()->name }}"></label>
                                        </li>
                                    @endforeach
                                </ul></td>
                                                    <td>
                                                        
                                                    @php
                                                        $qty = 0;
                                                       
                                                        
                                                            $qty = $product->current_stock;
                                                        
                                                        echo $qty;
                                                    @endphp
                                                </td>
                                                <td>{{ $product->unit_price }}</td>
                                                <td>{{ $product->sku }}</td>
                                                <!--<td><label class="switch">-->
                                                <!--    <input onchange="update_published(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->published == 1) echo "checked";?> >-->
                                                <!--    <span class="slider round"></span></label>-->
                                                <!--</td>-->
                                                <!--<td><label class="switch">-->
                                                <!--    <input onchange="update_featured(this)" value="{{ $product->id }}" type="checkbox" >-->
                                                <!--    <span class="slider round"></span></label>-->
                                                <!--</td>-->
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" id="dropdownMenuButton-{{  $product->id  }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" value="{{ $product->id }}"></i>
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton-{{ $key }}">
                                                        	 <button onclick="product_Edit(<?php echo $product->id;?> );" class="dropdown-item">{{__('Edit')}}</button>
                                                          <!--   <a href="{{route('seller.products.edit', encrypt($product->id))}}" class="dropdown-item">{{__('Edit')}}</a> -->
        					                                <button onclick="product_delete(<?php echo $product->id;?> );" class="dropdown-item">{{__('Delete')}}</button>
        					                                
                                                            <a href="#" class="dropdown-item">{{__('Duplicate')}}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="pagination-wrapper py-4">
                            <ul class="pagination justify-content-end">
                                {{ $products->links() }}
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('script')

    <script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Featured products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Published products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }
        function product_delete(id){
         // var  _token='{{ csrf_token() }}';
            		if(id !=0){
                        Swal.fire({
                                  title: 'Do you want to Delete the Product?',
                                  showCancelButton: true,
                                  confirmButtonText: `Delete`,
                                  confirmButtonColor: '#d33',
                                  
                                }).then((result) => {
                              /* Read more about isConfirmed, isDenied below */
                              if (result.value) { 
                              $.ajax({                        

										url: "product/product_delete",
										type: "POST",
										data: { id:id,_token:'{{ csrf_token() }}'},
                                success: function(data)
                                {
  									  Swal.fire('Deleted..!', '', 'success');
  									  window.location.reload();
                                }
                             });
  							}
						})
            		}
        		}
            
</script>
@endsection
