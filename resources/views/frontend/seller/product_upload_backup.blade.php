@extends('frontend.layouts.app')

@section('content')
  <style>
.box {
   height: 20px;
   width: 20px;
   margin-bottom: 5px;
   border-radius: 50%;
   border: 1px #D3D3D3;
}
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid grey;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #D3D3D3;
  border: 1px solid grey;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: #D3D3D3;
}
.button {
  background-color: #7db4ec; /* Green */
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-weight: bold;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 4px;
  border: red;
  border: 2px solid #0b1702;
  width:50%;
}
.button2:hover {
  background-color: #167fea;
  color: red;
  border: red;

}

</style>

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
                                        {{__('Select Your Category')}}
                                    </h2>
                                      <b> <a href="{{ route('home') }}" style="margin-left:1rem;">{{__('>Home')}}</a></b>
                                      <b> <a href="{{ route('dashboard') }}">{{__('>Dashboard')}}</a></b>  
                                </div>
                                </div>
                             
                            </div>
                        </div>
                        <form class="" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
                            @csrf
                    		<input type="hidden" name="added_by" value="seller">

                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Product Catagory')}}
                                </div>
                                <div class="form-box-content p-3">
                                   
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>{{__('Product Category')}} <span class="required-star">*</span></label>
                                            
                                        </div>
                                        <div class="col-md-7">
										 <div class="form-control mb-3 c-pointer" data-toggle="modal" data-target="#categorySelectModal" id="product_category">{{__('Select a category')}}</div>
                                            
                                           <input type="hidden" name="category_id" id="category_id" value="" required>
                                       <input type="hidden" name="subcategory_id" id="subcategory_id" value="" required>
                                       
                                       </div><div class="col-md-2"></div>
										</div>
                                      </div>
                                  </div>
                                           <!--      <select class="form-control mb-3 selectpicker" data-placeholder="Select a brand" id="categories" name="categories" required>
                                                    <option value="0">{{ ('Select Catagory') }}</option>
                                                  //  <$categories=DB::table('categories')->select(//'id','cat_name')->get();
                                              
                                                    
                                                </select> 
                                            </div>
                                            </div><br>
                                            <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Product Sub Category')}} <span class="required-star">*</span></label>
                                            
                                        </div>
                                            <div class="col-md-10">
												 
                                                <select class="form-control mb-3 selectpicker" data-placeholder="Select Sub Catagory" id="sub_category" name="sub_category" required>
                                                   <option value="">Select Sub Catagory</option>
                                                </select>
                                            </div>
                                            </div>-->
                                   <br><br>
                                  
                                        <!--    <div class="form-control mb-3 c-pointer" data-toggle="modal" data-target="#categorySelectModal" id="product_category">{{__('Select a category')}}</div>-->
                                            
                                        <!--    <input type="hidden" name="category_id" id="category_id" value="" required>-->
                                        <!--    <input type="hidden" name="subcategory_id" id="subcategory_id" value="" required>-->
                                        <!--    <input type="hidden" name="subsubcategory_id" id="subsubcategory_id" value="">-->
                                        <!--</div>-->
                                    
                                    <!-- <div class="row">-->
                                    <!--    <div class="col-md-2">-->
                                    <!--        <label>{{__('Product Name')}} <span class="required-star">*</span></label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-md-10">-->
                                    <!--        <input type="text" class="form-control mb-3" name="name" placeholder="{{__('Product Name')}}" required>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                   <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Product Identity')}}
                                </div> 
								                <div class="form-box-content p-3">
                                    <div class="row">
                                       
                                        <div class="col-md-6">
                                             <label><b>{{__('ARE THERE VARIANTS IN THIS PRODUCT ?')}}</b></label></div>
                                               <div class="col-md-6">
                                             <label for="male"><b>YES</b></label>
                                            <input type="radio"  id="yes" class="timespan" name="variant" value="yes">
                                           
                                             <label for="male" style="margin-left: 2rem;"><b>NO</b></label>
                                            <input type="radio"  id="no" class="timespan" name="variant" value="no">
                                           
                                        
                                        </div>
                                    </div><br><br>
                                    <span id="content1" >
                                         <div class="row" >
                                        <div class="col-md-2">
                                            <label>{{__('Product Brand')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <select class="form-control mb-3 selectpicker" data-placeholder="Select a brand" id="brands" name="brand_id">
                                                    <option value="">{{ ('Select Brand') }}</option>
                                                    @foreach (\App\Brand::all() as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->b_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                          </div>
                                            <div class="col-md-2"> 
                                        <button type="button" class="btn btn-info mb-3"style="float:right;" onclick="add_more_brand()" data-toggle="modal" data-target="#brandSelectModal" id="product_category">{{ __('Add Brand') }}</button>
                                    </div>
                                        
                                    </div>                                    
                                   <div id="id-colour">
                                      <div class="row">
                                        <div class="col-md-2">
        								<label>{{__('Colours')}} <span class="required-star">*</span></label>
        								</div>
										 <div class="col-md-8">
                                            <div class="mb-3">
                                                <select class="form-control colorsnamecode" name="colors[]" id="colorsid" data-placeholder="Select colours">
                                                    <option value="">{{ ('Select Colour') }}</option>
                                                    @foreach (\App\Color::orderBy('name', 'asc')->get() as $key => $color)
                                                        <option value="{{ $color->code}}" style="background-color:{{$color->code}}"  data-name="{{$color->name}}" >{{ $color->name }}  </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>	
                                         <div class="col-md-2">   
                                        <button type="button" class="btn btn-info mb-3"style="float:right;" onclick="add_field_colour()" >{{ __('Add Colour') }}</button>
                                   
                                        </div>	 								
                                      </div>	 								
        								
                                    </div><br>
									
                                     
                                      <div class="row" >
									 
                                        <div class="col-md-2">
                                            <label>{{__('Unit')}} <span class="required-star">*</span></label>
                                        </div>
                                      <div class="col-md-8  ">
                                          
                                         <div class="mb-3">
                                                <select class="form-control mb-3 selectpicker" data-placeholder="Select Unit" id="brands" name="brand_id">
                                                    <option value="">{{ ('Select Unit') }}</option>
                                                   
                                               <option value="small ">{{ 'US' }}</option>
                                               <option value="extra-small">{{ 'UK' }}</option>
                                               <option value="medium">{{ 'Centi Meter  (CM)' }}</option>
                                               <option value="large">{{ 'Mili Meter  (MM)' }}</option>
                                               
                                                 
                                                </select>
                                            </div>  
                                            </div>   <div class="col-md-2"> </div>  
                                     </div>
									 <div id="input_fields_wrap" >
                                      <div class="row" >
									     <div class="col-md-2">
                                            <label>{{__('Size')}} <span class="required-star">*</span></label>
                                        </div>
											 <div class="col-md-8 "> 
                                           <input type="text" class="form-control mb-3" name="size[]" placeholder="{{__('Size')}}"  required>  </div> 
										   <div class="col-md-2">  
										    <button type="button" class="btn btn-info mb-3 add_field_button"onclick="add_field_button()">{{ __('Add Size') }}</button>
										   </div> 
                                        </div>                   
                                        </div>                   
                                        
                                        
                                   
                                     <div class="row " >
                                        <div class="col-md-2">
                                            <label>{{__('Group ID')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10 ">
                                           
                                           <input type="text" class="form-control mb-3" name="group_id"id="group_id" placeholder="{{__('Group ID')}}"  required>
                                            
                                        </div>
                                    </div>
									
									<div class="text-center">   
                                        <button type="button" class="btn btn-danger mb-3"style="float:center;margin-top:1rem;" onclick="add_field_variant()" >{{ __('Genarate Variant') }}</button>
                                   
                                        </div>
                                   <!--  <div class="form-box-content p-3">
                                    
                                    <div class="row ">
                                        <div class="col-md-2">
                                            <label>{{__('Variants')}}<span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                           
                                                <select name="choice_attributes[]" id="choice_attributes" class="form-control selectpicker" multiple data-placeholder="Choose Variants">
                                                    @foreach (\App\Attribute::all() as $key => $attribute)
            											<option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
            										@endforeach
            			                        </select>
                                            
                                        </div>
                                    </div>
                                    <br>
                                    <div class="mb-3">
        								<p>Choose the attributes of this product and then input values of each attribute</p>
        							</div>
                                    <div id="customer_choice_options">

                                    </div>
                                    <div class="row">
                                        <div class="col-2">
        									<button type="button" class="btn btn-info" onclick="add_more_customer_choice_option()">{{ __('Add More Customer Choice Option') }}</button>
        								</div>
                                    </div> 
                                </div>-->
                                    </span>
                                    <span id="content2" >
                                        <div class="row" >
                                        <div class="col-md-2">
                                            <label>{{__('Product Brand')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <select class="form-control mb-3 selectpicker" data-placeholder="Select a brand" id="brands" name="brand_id">
                                                    <option value="">{{ ('Select Brand') }}</option>
                                                    @foreach (\App\Brand::all() as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->b_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                          </div>
                                            <div class="col-md-2"> 
                                        <button type="button" class="btn btn-info mb-3"style="float:right;" onclick="add_more_brand()" data-toggle="modal" data-target="#brandSelectModal" id="product_category">{{ __('Add Brand') }}</button>
                                    </div>
                                        
                                    </div>                                    
                                   <div id="id-colour">
                                      <div class="row">
                                        <div class="col-md-2">
        								<label>{{__('Colours')}} <span class="required-star">*</span></label>
        								</div>
										 <div class="col-md-8">
                                            <div class="mb-3">
                                                <select class="form-control " name="colorsname" id="colorsid" data-placeholder="Select colours">
                                                    <option value="">{{ ('Select Colour') }}</option>
                                                    @foreach (\App\Color::orderBy('name', 'asc')->get() as $key => $color)
                                                        <option value="{{ $color->code}}" style="background-color:{{$color->code}}"  data-name="{{$color->name}}" >{{ $color->name }}  </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>	
                                         <div class="col-md-2">   
                                      
                                   
                                        </div>	 								
                                      </div>	 								
        								
                                    </div><br>
									
                                     
                                      <div class="row" >
									 
                                        <div class="col-md-2">
                                            <label>{{__('Unit')}} <span class="required-star">*</span></label>
                                        </div>
                                      <div class="col-md-8  ">
                                          
                                         <div class="mb-3">
                                                <select class="form-control mb-3 selectpicker" data-placeholder="Select Unit" id="brands" name="brand_id">
                                                    <option value="">{{ ('Select Unit') }}</option>
                                                   
                                               <option value="small ">{{ 'US' }}</option>
                                               <option value="extra-small">{{ 'UK' }}</option>
                                               <option value="medium">{{ 'Centi Meter  (CM)' }}</option>
                                               <option value="large">{{ 'Mili Meter  (MM)' }}</option>
                                               
                                                 
                                                </select>
                                            </div>  
                                            </div>   <div class="col-md-2"> </div>  
                                     </div>
									                <div id="input_fields_wrap" >
                                      <div class="row" >
									                  <div class="col-md-2">
                                            <label>{{__('Size')}} <span class="required-star">*</span></label>
                                        </div>
											              <div class="col-md-8 "> 
                                           <input type="text" class="form-control mb-3" name="sizename" placeholder="{{__('Size')}}"  required>  </div> 
                  										   <div class="col-md-2">  
                  										    
                  										   </div> 
                                        </div>                   
                                        </div>                   
                                        
                                        
                                   
                                     <div class="row " >
                                        <div class="col-md-2">
                                            <label>{{__('Product ID')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-8 ">
                                           
                                           <input type="text" class="form-control mb-3" name="product_id"id="product_id" placeholder="{{__('Product ID')}}"  required>
                                            
                                        </div>
									                       	<div class="col-md-2">   
                                      
                                   
                                        </div>	
                                    </div>
                                    <br><br>
                                    </span>
                                    
                                   

                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-2">-->
                                    <!--        <label>{{__('Product Unit')}}<span class="required-star">*</span></label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-md-10">-->
                                    <!--        <input type="text" class="form-control mb-3" name="unit" placeholder="Product unit" required>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-2">-->
                                    <!--        <label>{{__('Product Stock')}}<span class="required-star">*</span></label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-md-10">-->
                                    <!--        <input type="text" class="form-control mb-3" name="stock" placeholder="Product Stock" required>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-2">-->
                                    <!--        <label>{{__('Product Tag')}} <span class="required-star">*</span></label>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-md-10">-->
                                    <!--        <input type="text" class="form-control mb-3 tagsInput" name="tags[]" placeholder="Type & hit enter" data-role="tagsinput" required>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    @php
                                        $pos_addon = \App\Addon::where('unique_identifier', 'pos_system')->first();
                                    @endphp
                                    @if ($pos_addon != null && $pos_addon->activated == 1)
            							<!--<div class="row mt-2">-->
            							<!--	<label class="col-md-2">{{__('Barcode')}}</label>-->
            							<!--	<div class="col-md-10">-->
            							<!--		<input type="text" class="form-control mb-3" name="barcode" placeholder="{{ __('Barcode') }}">-->
            							<!--	</div>-->
            							<!--</div>-->
                                    @endif

                                    @php
                                        $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                                    @endphp
                                    @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
            							<!--<div class="row mt-2">-->
            							<!--	<label class="col-md-2">{{__('Refundable')}}</label>-->
            							<!--	<div class="col-md-10">-->
            							<!--		<label class="switch" style="margin-top:5px;">-->
            							<!--			<input type="checkbox" name="refundable" checked>-->
            			    <!--                        <span class="slider round"></span></label>-->
            							<!--		</label>-->
            							<!--	</div>-->
            							<!--</div>-->
                                    @endif
                                </div>
                            </div>
                            <div class="form-box bg-white mt-4" style="width:105%;">
                            <div class="row">
                                 <div class="col-md-12">
                            <table id="usn_tbl" class="table table-bordered" >
                                    <thead>
                                         <tr >
                                        <th ><center>Product ID</center></th>
                                         <th class="text-center">Colour</th>
                                         <th class="text-center">Size</th>                     
                                         <th class="text-center">SKU</th>                     
                                         <th class="text-center">Quantity</th>
                                         <th class="text-center">Stock</th>
                                    </tr>
                                </thead>
                           <tbody  id="usn_bdy"></tbody>
                     </table>
					 
                </div>
            </div>
            </div>
			<br><br>
			<div class="form-box bg-white mt-4" id="women_Accessories_Handbags_details">
			<div class="form-box-content p-3 ">
			<div class="form-box-title px-3 py-2">Mandatory Information</div>
			<div class="form-box-content p-3 ">
			<div class="row">
			<div class="col-md-3"><label><b>Material :</b></label>
			</div>
			<div class="col-md-9">
			<input type="text"  class="form-control mb-3" name="HandbagsMaterial" id="HandbagsMaterial" placeholder="Ex Acrylic"/></div></div>
			<div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Accessories_Handbags_Occasion" name="women_Accessories_Handbags_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
			<div class="row">
			<div class="col-md-3">
			<label><b>Theme :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="HandbagsTheme" id="HandbagsTheme" placeholder="Ex leather Totes"/>
			</div></div></div>
			</div>
			</div>

			<div class="form-box bg-white mt-4" id="women_Accessories_Traveller_details">
			<div class="form-box-content p-3 ">
			<div class="form-box-title px-3 py-2">Mandatory Information</div>
			<div class="form-box-content p-3 ">
			
			<div class="row"><div class="col-md-3"><label><b> Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Type" id="women_Accessories_Traveller_type" name="women_Accessories_Traveller_type" required><option value="">Select Type</option></select></div></div></div>
			</div>
			</div>
			</div>

			<div class="form-box bg-white mt-4" id="women_Accessories_Wallets_Belts_details">
			<div class="form-box-content p-3 ">
			<div class="form-box-title px-3 py-2">Mandatory Information</div>
			<div class="form-box-content p-3 ">
		<div class="row">
            <div class="col-md-3">
            <label><b>Theme :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="Wallets_BeltsTheme" id="Wallets_BeltsTheme" placeholder="Ex Leather Wallet"/>
            </div></div>			
			</div>
			</div>
			</div>
      <div class="form-box bg-white mt-4" id="women_Accessories_Saree_Shapewear_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
    <div class="row">
            <div class="col-md-3">
            <label><b>Fabrics :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="ShapewearFabrics" id="ShapewearFabrics" placeholder="Ex Silk"/>
            </div></div>      
      </div>
      </div>
      </div>
      <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_Dhoti_Pants_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
    <div class="row">
            <div class="col-md-3">
            <label><b>Fabrics :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="Dhoti_Pants_Fabrics" id="Dhoti_Pants_Fabrics" placeholder="Ex Cotton silk"/>
            </div></div>  
             <div class="row">
            <div class="col-md-3">
            <label><b>Type :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="Dhoti_Pants_Type" id="Dhoti_Pants_Type" placeholder="Ex Jhodhpuri"/>
            </div></div>      
      </div>
      </div>
      </div>

			<div class="form-box bg-white mt-4" id="women_Beauty_Grooming_details">
			<div class="form-box-content p-3 ">
			<div class="form-box-title px-3 py-2">Mandatory Information</div>
			<div class="form-box-content p-3 ">
				<div class="row"><div class="col-md-3"><label><b> Ideal For : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Type"  id="women_Beauty_Grooming_Ideal_for" name="women_Beauty_Grooming_Ideal_for" required><option value="" >Select Ideal For</option></select></div></div></div>
			
			</div>
			</div>
			</div> 

      <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_Dupattas_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
        <div class="row">
            <div class="col-md-3">
            <label><b>Dupptta length :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="Duppttalength" id="Duppttalength" placeholder="Ex Cotton silk"/>
            </div></div>  
             <div class="row">
            <div class="col-md-3">
            <label><b>Fabrics :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="DuppttaFabrics" id="DuppttaFabrics" placeholder="Ex Cotton Lycra Blend"/>
            </div></div> 
        <div class="row"><div class="col-md-3"><label><b> Pattern Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Pattern Type"  id="women_Ethnic_Wear_Dupattas_Pattern" name="women_Ethnic_Wear_Dupattas_Pattern" required><option value="" >Select Pattern Type</option></select></div></div></div>
      
      </div>
      </div>
      </div>

       <div class="form-box bg-white mt-4" id="women_Foot_Wear_SportsShoes_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">         
             <div class="row">
            <div class="col-md-3">
            <label><b>Theme :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="SportsShoesTheme" id="SportsShoesTheme" placeholder="Ex Sport Sneaker"/>
            </div></div> 
        <div class="row"><div class="col-md-3"><label><b> Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Type"  id="women_Ethnic_Wear_SportsShoes_type" name="women_Ethnic_Wear_SportsShoes_type" required><option value="" >Select Type</option></select></div></div></div>      
      </div>
      </div>
      </div>

       <div class="form-box bg-white mt-4" id="women_Foot_Wear_CasualShoes_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">   
       <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Foot_Wear_CasualShoes_Occasion" name="women_Foot_Wear_CasualShoes_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>      
             <div class="row">
            <div class="col-md-3">
            <label><b>Theme :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="CasualShoesTheme" id="CasualShoesTheme" placeholder="Ex Sport Sneaker"/>
            </div></div> 
        <div class="row"><div class="col-md-3"><label><b> Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Type"  id="women_Foot_Wear_CasualShoes_type" name="women_Foot_Wear_CasualShoes_type" required><option value="" >Select Type</option></select></div></div></div>      
      </div>
      </div>
      </div>
      <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_Lehenga_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
        <div class="row"><div class="col-md-3"><label><b> Dupatta Included : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Dupatta Included"  id="women_Beauty_Grooming_Ideal_for" name="women_Beauty_Grooming_Ideal_for" required><option value="" >Select Dupatta Included</option>
          <option value="1" >YES</option><option value="0" >NO</option></select></div></div></div>
        <div class="row">
            <div class="col-md-3">
            <label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="LehengaFabric" id="LehengaFabric" placeholder="Ex Cotton"/>
            </div></div>
        <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Ethnic_Wear_Lehenga_Occasion" name="women_Ethnic_Wear_Lehenga_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
         <div class="row"><div class="col-md-3"><label><b>Pattern Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Pattern Type" id="women_Ethnic_Wear_Lehenga_pattern" name="women_Ethnic_Wear_Lehenga_pattern" required><option value="">Select Pattern Type</option></select></div></div></div>
          <div class="row"><div class="col-md-3"><label><b>Sleeve Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Sleeve Type" id="women_Ethnic_Wear_Lehenga_sleeve" name="women_Ethnic_Wear_Lehenga_sleeve" required><option value="">Select Sleeve Type</option></select></div></div></div>
          <div class="row"><div class="col-md-3"><label><b>Theme Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Theme Type" id="women_Ethnic_Wear_Lehenga_theme" name="women_Ethnic_Wear_Lehenga_theme" required><option value="">Select Theme Type</option></select></div></div></div>
           <div class="row"><div class="col-md-3"><label><b> Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Type" id="women_Ethnic_Wear_Lehenga_type" name="women_Ethnic_Wear_Lehenga_type" required><option value="">Select Type</option></select></div></div></div>
      </div>
      </div>
      </div>
      <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_Sarees_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
        <div class="row"><div class="col-md-3"><label><b> Blouse Included : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Blouse Included"  id="women_Ethnic_Wear_Sarees_Blouse" name="women_Ethnic_Wear_Sarees_Blouse" required><option value="" >Select Blouse Included</option>
          <option value="1" >YES</option><option value="0" >NO</option></select></div></div></div>
           <div class="row">
            <div class="col-md-3">
            <label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="SareesFabric" id="SareesFabric" placeholder="Ex Cotton"/>
            </div></div>        
        <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Ethnic_Wear_Sarees_Occasion" name="women_Ethnic_Wear_Sarees_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
         <div class="row">
            <div class="col-md-3">
            <label><b>Pattern :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="SareesPattern" id="SareesPattern" placeholder="Ex Floral print"/>
            </div></div>
              <div class="row">
            <div class="col-md-3">
            <label><b>Saree Lenght :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="SareesLenght" id="SareesLenght" placeholder="Ex 5 Mtr"/>
            </div></div>             
         <div class="row"><div class="col-md-3"><label><b>Saree Style : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Saree Style" id="women_Ethnic_Wear_Sarees_Style" name="women_Ethnic_Wear_Sarees_Style" required><option value="">Select Saree Style</option></select></div></div></div>
        <div class="row">
            <div class="col-md-3">
            <label><b>Saree Type :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="SareesType" id="SareesType" placeholder="Ex Banarasi"/>
            </div></div>

      </div>
      </div>
      </div>

 <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_Kurtas_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
      
        <div class="row">
            <div class="col-md-3">
            <label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="KurtasFabric" id="KurtasFabric" placeholder="Ex Cotton"/>
            </div></div>           
            <div class="row"><div class="col-md-3"><label><b>Lenght Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Lenght Type" id="women_Ethnic_Wear_Kurtas_lenght" name="women_Ethnic_Wear_Kurtas_lenght" required><option value="">Select Lenght Type</option></select></div></div></div>
        <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Ethnic_Wear_Kurtas_Occasion" name="women_Ethnic_Wear_Kurtas_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
         <div class="row"><div class="col-md-3"><label><b>Pattern Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Pattern Type" id="women_Ethnic_Wear_Kurtas_pattern" name="women_Ethnic_Wear_Kurtas_pattern" required><option value="">Select Pattern Type</option></select></div></div></div>
          <div class="row"><div class="col-md-3"><label><b>Sleeve Lenght Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Sleeve Lenght Type" id="women_Ethnic_Wear_Kurtas_sleeve_lenght" name="women_Ethnic_Wear_Kurtas_sleeve_lenght" required><option value="">Select Sleeve Lenght Type</option></select></div></div></div>
           <div class="row">
            <div class="col-md-3">
            <label><b>Theme :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="KurtasTheme" id="KurtasTheme" placeholder="Ex Pinks & Peaches"/>
            </div></div>
           <div class="row"><div class="col-md-3"><label><b> Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Type" id="women_Ethnic_Wear_Kurtas_type" name="women_Ethnic_Wear_Kurtas_type" required><option value="">Select Type</option></select></div></div></div>
      </div>
      </div>
      </div>

<div class="form-box bg-white mt-4" id="women_Ethnic_Wear_Blouse_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
        <div class="row"><div class="col-md-3"><label><b>Closure Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Closure Type" id="women_Ethnic_Wear_Blouse_closure_type" name="women_Ethnic_Wear_Blouse_closure_type" required><option value="">Select Closure Type</option></select></div></div></div>
        <div class="row">
            <div class="col-md-3">
            <label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="BlouseFabric" id="BlouseFabric" placeholder="Ex Cotton Bizo"/>
            </div></div>
        <div class="row"><div class="col-md-3"><label><b>Neck Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Neck Type" id="women_Ethnic_Wear_Blouse_neck" name="women_Ethnic_Wear_Blouse_neck" required><option value="">Select Neck Type</option></select></div></div></div>
         <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Ethnic_Wear_Blouse_Occasion" name="women_Ethnic_Wear_Blouse_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
         <div class="row"><div class="col-md-3"><label><b>Pattern Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Pattern Type" id="women_Ethnic_Wear_Blouse_pattern" name="women_Ethnic_Wear_Blouse_pattern" required><option value="">Select Pattern Type</option></select></div></div></div>
          
      </div>
      </div>
      </div>

      <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_DressMaterial_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
      
        <div class="row">
            <div class="col-md-3">
            <label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="DressMaterialFabric" id="DressMaterialFabric" placeholder="Ex Cotton"/>
            </div></div> 

         <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Ethnic_Wear_DressMaterial_Occasion" name="women_Ethnic_Wear_DressMaterial_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
         <div class="row"><div class="col-md-3"><label><b>Pattern Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Pattern Type" id="women_Ethnic_Wear_DressMaterial_pattern" name="women_Ethnic_Wear_DressMaterial_pattern" required><option value="">Select Pattern Type</option></select></div></div></div> 
         <div class="row">
            <div class="col-md-3">
            <label><b>Styling :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="DressMaterialStyling" id="DressMaterialStyling" placeholder="Ex Applique, Beads & Stones"/>
            </div></div>   
         <div class="row"><div class="col-md-3"><label><b> Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Type" id="women_Ethnic_Wear_DressMaterial_type" name="women_Ethnic_Wear_DressMaterial_type" required><option value="">Select  Type</option></select></div></div></div>
          
      </div>
      </div>
      </div>

      <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_Palazzos_details">
      <div class="form-box-content p-3 "><div class="form-box-title px-3 py-2">Mandatory Information</div><div class="form-box-content p-3 ">      
        <div class="row"><div class="col-md-3"><label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="PalazzosFabric" id="PalazzosFabric" placeholder="Ex Bhagalpuri silk"/></div></div>
         <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Ethnic_Wear_Palazzos_Occasion" name="women_Ethnic_Wear_Palazzos_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
         <div class="row"><div class="col-md-3"><label><b>Pattern Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Pattern Type" id="women_Ethnic_Wear_Palazzos_pattern" name="women_Ethnic_Wear_Palazzos_pattern" required><option value="">Select Pattern Type</option></select></div></div></div>
          <div class="row"><div class="col-md-3"><label><b>Suitable For : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Suitable For" id="women_Ethnic_Wear_Palazzos_suitable_for" name="women_Ethnic_Wear_Palazzos_suitable_for" required><option value="">Select Suitable For</option></select></div></div></div>          
      </div>
      </div>
      </div>
      <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_Salwars_details">
      <div class="form-box-content p-3 "><div class="form-box-title px-3 py-2">Mandatory Information</div><div class="form-box-content p-3 ">      
        <div class="row"><div class="col-md-3"><label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="SalwarsFabric" id="SalwarsFabric" placeholder="Ex Cotton silk"/></div></div>
         <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Ethnic_Wear_Salwars_Occasion" name="women_Ethnic_Wear_Salwars_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
         <div class="row"><div class="col-md-3"><label><b>Pattern Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Pattern Type" id="women_Ethnic_Wear_Salwars_pattern" name="women_Ethnic_Wear_Salwars_pattern" required><option value="">Select Pattern Type</option></select></div></div></div>
          <div class="row"><div class="col-md-3"><label><b>Suitable For : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Suitable For" id="women_Ethnic_Wear_Salwars_suitable_for" name="women_Ethnic_Wear_Salwars_suitable_for" required><option value="">Select Suitable For</option></select></div></div></div>          
      </div>
      </div>
      </div>
      <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_Shararas_details">
      <div class="form-box-content p-3 "><div class="form-box-title px-3 py-2">Mandatory Information</div><div class="form-box-content p-3 ">      
        <div class="row"><div class="col-md-3"><label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="ShararasFabric" id="ShararasFabric" placeholder="Ex Cotton silk"/></div></div>
         <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Ethnic_Wear_Shararas_Occasion" name="women_Ethnic_Wear_Shararas_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
         <div class="row"><div class="col-md-3"><label><b>Pattern Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Pattern Type" id="women_Ethnic_Wear_Shararas_pattern" name="women_Ethnic_Wear_Shararas_pattern" required><option value="">Select Pattern Type</option></select></div></div></div>
          <div class="row"><div class="col-md-3"><label><b>Suitable For : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Suitable For" id="women_Ethnic_Wear_Shararas_suitable_for" name="women_Ethnic_Wear_Shararas_suitable_for" required><option value="">Select Suitable For</option></select></div></div></div>          
      </div>
      </div>
      </div>

      <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_Gowns_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
      
        <div class="row">
            <div class="col-md-3">
            <label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="GownsFabric" id="GownsFabric" placeholder="Ex Cotton Linen Blend"/>
            </div></div> 

         <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Ethnic_Wear_Gowns_Occasion" name="women_Ethnic_Wear_DressMaterial_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
         <div class="row"><div class="col-md-3"><label><b>Sleeve Lenght : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Sleeve Lenght" id="women_Ethnic_Wear_Gowns_Sleeve_length" name="women_Ethnic_Wear_Gowns_Sleeve_length" required><option value="">Select Sleeve Lenght</option></select></div></div></div>        
         <div class="row"><div class="col-md-3"><label><b> Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Type" id="women_Ethnic_Wear_Gowns_type" name="women_Ethnic_Wear_Gowns_type" required><option value="">Select  Type</option></select></div></div></div>
          
      </div>
      </div>
      </div> 
      <div class="form-box bg-white mt-4" id="women_Ethnic_Wear_KurtaSet_details">
      <div class="form-box-content p-3 ">
      <div class="form-box-title px-3 py-2">Mandatory Information</div>
      <div class="form-box-content p-3 ">
      
        <div class="row">
            <div class="col-md-3">
            <label><b>Fabric :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="KurtaSetFabric" id="KurtaSetFabric" placeholder="Ex Lace "/>
            </div></div>
         <div class="row"><div class="col-md-3"><label><b>Occasion Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Occasion Type" id="women_Ethnic_Wear_KurtaSet_Occasion" name="women_Ethnic_Wear_KurtaSet_Occasion" required><option value="">Select Occasion Type</option></select></div></div></div>
           <div class="row"><div class="col-md-3"><label><b> Pattern Type : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Type" id="women_Ethnic_Wear_KurtaSet_pattern" name="women_Ethnic_Wear_KurtaSet_pattern" required><option value="">Select  Type</option></select></div></div></div>
         <div class="row"><div class="col-md-3"><label><b>Sleeve Lenght : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Sleeve Lenght" id="women_Ethnic_Wear_KurtaSet_Sleeve_length" name="women_Ethnic_Wear_KurtaSet_Sleeve_length" required><option value="">Select Sleeve Lenght</option></select></div></div></div>  
            <div class="row">
            <div class="col-md-3">
            <label><b>Type :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="KurtaSetFabric" id="KurtaSetFabric" placeholder="Ex Pathani and Pant Set "/>
            </div></div>       
       
          
      </div>
      </div>
      </div>

			<div class="form-box bg-white mt-4" id="women_Accessories_Sunglasses_details">
			<div class="form-box-content p-3 ">
			<div class="form-box-title px-3 py-2">Mandatory Information</div>
			<div class="form-box-content p-3 ">
			
			<div class="row"><div class="col-md-3"><label><b> Face Shape : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Face shape" id="women_Accessories_Sunglasses_Face_shape" name="women_Accessories_Sunglasses_Face_shape" required><option value="">Select Face shape</option></select></div></div></div>
			<div class="row"><div class="col-md-3"><label><b>  Frame Color : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select   Frame Color" id="women_Accessories_Sunglasses_Frame_Color" name="women_Accessories_Sunglasses_Frame_Color" required><option value="">Select  Frame Color</option></select></div></div></div>
			<div class="row"><div class="col-md-3"><label><b> Frame Material : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Frame Material" id="women_Accessories_Sunglasses_Frame_Material" name="women_Accessories_Sunglasses_Frame_Material" required><option value="">Select Frame material</option></select></div></div></div>
			 <div class="row"><div class="col-md-3"><label><b> Ideal For : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Ideal for" id="women_Accessories_Sunglasses_Ideal_for" name="women_Accessories_Sunglasses_Ideal_for" required><option value="">Select Ideal for</option></select></div></div></div>
			  <div class="row"><div class="col-md-3"><label><b> Lens Color : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Lens Color" id="women_Accessories_Sunglasses_Lens_Color" name="women_Accessories_Sunglasses_Lens_Color" required><option value="">Select Lens Color</option></select></div></div></div>
			    <div class="row"><div class="col-md-3"><label><b> Lens Feature : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Lens Feature" id="women_Accessories_Sunglasses_Lens_Feature" name="women_Accessories_Sunglasses_Lens_Feature" required><option value="">Select Lens Feature</option></select></div></div></div>
			     <div class="row"><div class="col-md-3"><label><b> Lens Material : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Lens Material" id="women_Accessories_Sunglasses_Lens_Material" name="women_Accessories_Sunglasses_Lens_Material" required><option value="">Select Lens Material</option></select></div></div></div>
			      <div class="row"><div class="col-md-3"><label><b> Size : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Size" id="women_Accessories_Sunglasses_Size" name="women_Accessories_Sunglasses_Size" required><option value="">Select Size</option></select></div></div></div> 
			      <div class="row"><div class="col-md-3"><label><b> Style : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Style" id="women_Accessories_Sunglasses_Style" name="women_Accessories_Sunglasses_Style" required><option value="">Select Style</option></select></div></div></div>
			      <div class="row">
            <div class="col-md-3">
            <label><b>Theme :</b></label></div><div class="col-md-9"><input type="text"  class="form-control mb-3" name="SunglassesTheme" id="SunglassesTheme" placeholder="Ex Metal Frame"/>
            </div></div>
                <div class="row"><div class="col-md-3"><label><b> Usage : </b></label></div><div class="col-md-9"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select  Usage" id="women_Accessories_Sunglasses_Usage" name="women_Accessories_Sunglasses_Usage" required><option value="">Select Usage</option></select></div></div></div>

			</div>
			</div>
			</div>
			
			<br><br>
					 <div class="row align-items-center">
		                        <div class="col-md-6">
			                          <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
			                                {{__('Product Images')}}
			                          </h2>
		                        </div>
		               </div>							
                            
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Images')}}
                                </div>
                                <div class="form-box-content p-3">
                                    <div id="product-images">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>{{__('Main Images')}} <span class="required-star">*</span></label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="file" name="photos[]" id="photos-1" class="custom-input-file custom-input-file--4 multiImage" data-multiple-caption="{count} files selected" accept="image/*" />
                                                <label for="photos-1" class="mw-100 mb-3" style="margin-top: 2rem">
                                                    <span ></span>
                                                    <strong id="img_count">
                                                        <i class="fa fa-upload"></i>
                                                       
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                  <!--   <div class="text-right"> 
                                        <button type="button" class="btn btn-info mb-3" onclick="add_more_slider_image()">{{ __('Add More') }}</button>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Thumbnail Image')}} <small>(290x300)</small> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" name="thumbnail_img" id="file-2" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" accept="image/*" />
                                            <label for="file-2" class="mw-100 mb-3">
                                                <span></span>
                                                <strong>
                                                    <i class="fa fa-upload"></i>
                                                    {{__('Choose image')}}
                                                </strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Featured')}} <small>(290x300)</small></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" name="featured_img" id="file-3" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" accept="image/*" />
                                            <label for="file-3" class="mw-100 mb-3">
                                                
                                                <strong>
                                                    <i class="fa fa-upload"></i>
                                                    {{__('Choose image')}}
                                                </strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Flash Deal')}} <small>(290x300)</small></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" name="flash_deal_img" id="file-4" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" accept="image/*" />
                                            <label for="file-4" class="mw-100 mb-3">
                                                <span></span>
                                                <strong>
                                                    <i class="fa fa-upload"></i>
                                                    {{__('Choose image')}}
                                                </strong>
                                            </label>
                                        </div>
                                    </div><br><br><br>
                                   
                                     <p><b style="color:red;font-size:large;margin-left: 2rem;">Image Guidelines For Vertical </b></p>

                                     <ul>
                                        <li>Maximum Images Supportted - 5.</li>
                                        <li>Minimum Images Supportted - 2.</li>
                                        <li>Minimum Images Resolution - 1100 * 1100.</li>
                                        <li>Image Should be having pure white or light grey background.</li>
                                        <li>Image Should't be blurred.</li>
                                        <li>Product Should occupy 80% of space in Image.</li>
                                        <li>Include all Products in primary Image(first image).</li>
                                      </ul>

                                   
                                </div>
                            </div>
                           

               <!--             <div class="form-box bg-white mt-4">-->
               <!--                 <div class="form-box-title px-3 py-2">-->
               <!--                     {{__('Customer Choice')}}-->
               <!--                 </div>-->
               <!--                 <div class="form-box-content p-3">-->
               <!--                     <div class="row mb-3">-->
               <!--                         <div class="col-8 col-md-3 order-1 order-md-0">-->
        							<!--		<input type="text" class="form-control" value="{{__('Colors')}}" disabled>-->
        							<!--	</div>-->
        							<!--	<div class="col-12 col-md-7 col-xl-8 order-3 order-md-0 mt-2 mt-md-0">-->
        							<!--		<select class="form-control color-var-select" name="colors[]" id="colors" multiple>-->
        							<!--			@foreach (\App\Color::orderBy('name', 'asc')->get() as $key => $color)-->
        							<!--				<option value="{{ $color->code }}">{{ $color->name }}</option>-->
        							<!--			@endforeach-->
        							<!--		</select>-->
        							<!--	</div>-->
        							<!--	<div class="col-4 col-xl-1 col-md-2 order-2 order-md-0 text-right">-->
        							<!--		<label class="switch" style="margin-top:5px;">-->
        							<!--			<input value="1" type="checkbox" name="colors_active" checked>-->
        							<!--			<span class="slider round"></span>-->
        							<!--		</label>-->
        							<!--	</div>-->
               <!--                     </div>-->
               <!--                     <div class="row mb-3">-->
               <!--                         <div class="col-md-Weight 3">-->
               <!--                             <label>{{__('Attributes')}}</label>-->
               <!--                         </div>-->
               <!--                         <div class="col-md-7">-->
               <!--                             <div class="">-->
               <!--                                 <select name="choice_attributes[]" id="choice_attributes" class="form-control selectpicker" multiple data-placeholder="Choose Attributes">-->
               <!--                                     @foreach (\App\Attribute::all() as $key => $attribute)-->
            			<!--								<option value="{{ $attribute->id }}">{{ $attribute->name }}</option>-->
            			<!--							@endforeach-->
            			<!--                        </select>-->
               <!--                             </div>-->
               <!--                         </div>-->
               <!--                     </div>-->

               <!--                     <div class="mb-3">-->
        							<!--	<p>Choose the attributes of this product and then input values of each attribute</p>-->
        							<!--</div>-->
               <!--                     <div id="customer_choice_options">-->

               <!--                     </div>-->
               <!--                     {{-- <div class="row">-->
               <!--                         <div class="col-2">-->
        							<!--		<button type="button" class="btn btn-info" onclick="add_more_customer_choice_option()">{{ __('Add More Customer Choice Option') }}</button>-->
        							<!--	</div>-->
               <!--                     </div> --}}-->
               <!--                 </div>-->
               <!--             </div>-->

							
            <br><br>
							<div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{__('Selling Details')}}
                                    </h2>
                                </div>
                                </div>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Price')}}
                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Unit Price')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" min="0"   class="form-control mb-3" name="unit_price" placeholder="{{__('Unit Price')}}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('MRP')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" min="0"   class="form-control mb-3" name="mrp" id="mrp" placeholder="{{__('MRP')}}" required>
                                        </div>
                                    </div>
                                  <!--   <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Images')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" min="0"  class="form-control mb-3" name="product_price" id="product_price" placeholder="{{__('Product Price')}}" required onkeyup="update_price();">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Commission Fee')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" min="0"  class="form-control mb-3" name="product_commission" id="product_commission" placeholder="{{__('Commission Fee')}}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Logistic Fee')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" min="0" class="form-control mb-3" name="product_logistick" id="product_logistick" placeholder="{{__('Logistic Fee')}}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Convenience  Fee')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" min="0"  class="form-control mb-3" name="product_convenience" id="product_convenience" placeholder="{{__('Convenience  Fee')}}" required>
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Seller Price')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" min="0" class="form-control mb-3" name="seller_price"id="seller_price" value="0" placeholder="{{__('Seller Price')}}"  disabled>
                                             
                                        </div>
                                    </div>
                                    <!--  <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('GST')}}</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" min="0" class="form-control mb-3" name="gst" id="gst" placeholder="{{__('GST')}}" required>
                                        </div>
                                        <div class="col-4 col-md-2">
                                            <div class="mb-3">
                                                <select class="form-control selectpicker" name="tax_type" data-minimum-results-for-search="Infinity">
                                                    <option value="percent">₹</option>
                                                    <option value="percent">%</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Display Price')}}<span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                        <input type="text"  class="form-control mb-3" name="display_price" id="display_price" placeholder="{{__('Display Price')}}" >
                                       
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Discount')}}</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" min="0"  class="form-control mb-3" name="discount" id="discount" placeholder="{{__('Discount')}}" disabled>
                                            <input type="hidden" name="product_discount" id="product_discount" value="0" />
                                        </div>
                                        <div class="col-4 col-md-2">
                                            <div class="mb-3">
                                                <select class="form-control selectpicker" name="discount_type" data-minimum-results-for-search="Infinity">
                                                    <option value="percent">%</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                     
                                    
                                  <!--   <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Quantity')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text"  class="form-control mb-3" name="quantity" id="quantity" placeholder="{{__('Quantity')}}" value="0" >
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-12" id="sku_combination">

                                        </div>
                                    </div>
                                </div>
                            </div><br><br>
							                             @if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'product_wise_shipping')
															 
									           <div class="col-md-6">
                                  <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{__('Shipping Details')}}
                                    </h2>
                                </div>
                                <div class="form-box bg-white mt-4">
						
                                    <div class="form-box-title px-3 py-2">
                                        {{__('Shipping')}}
                                    </div>
                                    <div class="form-box-content p-3">
                                        <!--<div class="row">--> 
                                        <!--    <div class="col-md-2">-->
                                        <!--        <label>{{__('Flat Rate')}}</label>-->
                                        <!--    </div>-->
                                        <!--    <div class="col-md-8">-->
                                        <!--        <input type="number" min="0" step="0.01" value="0" class="form-control mb-3" name="flat_shipping_cost" placeholder="{{__('Flat Rate Cost')}}">-->
                                        <!--    </div>-->
                                        <!--    <div class="col-md-2">-->
                                        <!--        <label class="switch" style="margin-top:5px;">-->
                                        <!--            <input type="radio" name="shipping_type" value="flat_rate" checked>-->
                                        <!--            <span class="slider round"></span>-->
                                        <!--        </label>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                         
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Weight (kg)</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" min="0" step="0.01" value="0" class="form-control mb-3" name="weight" value="0" disabled placeholder="{{__('Weight (kg)')}}">
                                            </div>
                                             </div>
                                            <div class="row">
                                            <div class="col-md-2">
                                                <label>Dimension (cm)</label>
                                            </div>
                                            <div class="col-md-8">
                                                
                                            </div></div>
                                             
                                             <div class="row">
                                            <div class="col-md-2">
                                                <label>Height</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" min="0" step="0.01" value="0" class="form-control mb-3" name="height" id="height " value="0" disabled placeholder="{{__('Height')}}">
                                            </div>
                                             </div>
                                             <div class="row">
                                            <div class="col-md-2">
                                                <label>Breadth</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" min="0" step="0.01" value="0" class="form-control mb-3" name="breadth" id="breadth " value="0" disabled placeholder="{{__('Breadth')}}">
                                            </div>
                                             </div>
                                             <div class="row">
                                            <div class="col-md-2">
                                                <label>Width</label>
                                            </div>
                                            <div class="col-md-8">
                                               <input type="text" min="0"  class="form-control mb-3" name="width" id="width " value="0" disabled placeholder="{{__('Width')}}">
                                            </div>
                                             </div>
                                            <!--<div class="col-md-2">-->
                                            <!--    <label class="switch" style="margin-top:5px;">-->
                                            <!--        <input type="radio" name="shipping_type" value="free" checked>-->
                                            <!--        <span class="slider round"></span>-->
                                            <!--    </label>-->
                                            <!--</div>-->
                                       
                                    </div>
                                </div><br><br>
                            @endif
                               <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{__('Delivery Charges To Buyers')}}
                                    </h2>
                                </div>
                                </div>
                             <div class="form-box bg-white mt-4">
                              <div class="form-box-content p-3">
                              <div class="row">
                                            <div class="col-md-4">
                                                <label><b>Local</b></label>
                                                <input type="text"  class="form-control mb-3" name="local" id="local"/>
                                            </div>
                                             <div class="col-md-4">
                                                <label><b>Zonal</b></label>
                                                <input type="text"  class="form-control mb-3" name="zonal" id="zonal"/>
                                            </div>
                                             <div class="col-md-4">
                                                <label><b>National</b></label>
                                                <input type="text"  class="form-control mb-3" name="national" id="national"/>
                                            </div>
                                    </div>
                                    </div>
                             </div><br><br>

							 <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{__('Additional Information')}}
                                    </h2>
                                </div>
                                </div>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('High Light Features')}}
                                <div class="form-box-title px-3 py-2">
                                <div class="col-md-12">
                                            <input type="text"  class="form-control mb-3" name="features" id="features" placeholder="{{__('High light features')}}" required>
                                        </div>
                                        </div>
                                </div>
                            </div>

                            <div class="form-box-content p-3 ">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Product Description')}}
                                     <div class="form-box-content p-3">
                                    <div class="col-md-10">
                                            <textarea name="product_description" rows="8" class="form-control mb-3"></textarea>
                                        </div>
                                        </div>
                                </div>
                            </div>
							
                      
							
                               
                                <div class="form-box bg-white mt-4">
                                     <div class="form-box-title px-3 py-2">
                                    {{__('Videos')}}
                                </div>
                                 <div class="form-box-title px-3 py-2">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Video From')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="video_provider">
                                                    <option value="youtube">{{__('Youtube')}}</option>
            										<option value="dailymotion">{{__('Dailymotion')}}</option>
            										<option value="vimeo">{{__('Vimeo')}}</option>
                                                </select>
                                            </div>
                                        </div>                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Video URL')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" name="video_link" placeholder="{{__('Video link')}}">
                                        </div>
                                    </div>
                                 </div>
                                </div>
                            
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Specification')}}
                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Product Specification')}}</label>
                                        </div>
                                         <div class="col-md-10">
                                            <textarea name="specification" id="specification" rows="8" class="form-control mb-3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Offer ')}}
                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Product Offer')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name="offer" id="offer"class="form-control mb-3"/>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Warranty ')}}
                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Product Warranty')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name="warranty" id="warranty"class="form-control mb-3"/>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Manufacture details ')}}
                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Product Manufacture details')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name="manufacture" id="manufacture"class="form-control mb-3"/>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							  <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Search Keyword')}}
                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Search Keyword Title')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name="meta_title" class="form-control mb-3" placeholder="{{__('Meta Title')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Search Keyword Description')}}</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="meta_description" rows="8" class="form-control mb-3"></textarea>
                                        </div>
                                    </div>
                                   <!-- <div class="row">
                                        <div class="col-md-2">
                                            <label>{{__('Meta Image')}} <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" name="meta_img" id="file-5" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" accept="image/*" />
                                            <label for="file-5" class="mw-100 mb-3">
                                                <span></span>
                                                <strong>
                                                    <i class="fa fa-upload"></i>
                                                    {{__('Choose image')}}
                                                </strong>
                                            </label>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            
                            <!--<div class="form-box bg-white mt-4">-->
                            <!--    <div class="form-box-title px-3 py-2">-->
                            <!--        {{__('Import Information Details')}}-->
                            <!--    </div>-->
                            <!--    <div class="form-box-content p-3">-->
                            <!--        <div class="row">-->
                            <!--            <div class="col-md-2">-->
                            <!--                <label>{{__('Excel')}}</label>-->
                            <!--            </div>-->
                            <!--            <div class="col-md-10">-->
                            <!--                <input type="file" name="import_excel" id="import_excel" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" />-->
                            <!--                <label for="file-6" class="mw-100 mb-3">-->
                            <!--                    <span></span>-->
                            <!--                    <strong>-->
                            <!--                        <i class="fa fa-upload"></i>-->
                            <!--                        {{__('Choose Excel')}}-->
                            <!--                    </strong>-->
                            <!--                </label>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="form-box mt-4 text-right">
                              <center>  <button type="submit" class="button button2" >{{ __('Save') }}</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="categorySelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Select Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="target-category heading-6">
                        <span class="mr-3">{{__('Target Category')}}:</span>
                        <span>{{__('category')}} > {{__('subcategory')}} > {{__('subsubcategory')}}</span>
                    </div>
                    <div class="row no-gutters modal-categories mt-4 mb-2">
                        <div class="col-4">
                            <div class="modal-category-box c-scrollbar">
                                <div class="sort-by-box">
                                    <form role="form" class="search-widget">
                                        <input class="form-control input-lg" type="text" placeholder="Search Category" onkeyup="filterListItems(this, 'categories')">
                                        <button type="button" class="btn-inner">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-category-list has-right-arrow">
                                    <ul id="categories">
                                        @foreach ($categories as $key => $category)
                                            <li onclick="get_subcategories_by_category(this, {{ $category->id }});">{{ __($category->cat_name) }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="modal-category-box c-scrollbar" id="subcategory_list">
                                <div class="sort-by-box">
                                    <form role="form" class="search-widget">
                                        <input class="form-control input-lg" type="text" placeholder="Search SubCategory" onkeyup="filterListItems(this, 'subcategories')">
                                        <button type="button" class="btn-inner">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-category-list has-right-arrow">
                                    <ul id="subcategories">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="modal-category-box c-scrollbar" id="subsubcategory_list">
                                <div class="sort-by-box">
                                    <form role="form" class="search-widget">
                                        <input class="form-control input-lg" type="text" placeholder="Search SubSubCategory" onkeyup="filterListItems(this, 'subsubcategories')">
                                        <button type="button" class="btn-inner">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-category-list">
                                    <ul id="subsubcategories">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('cancel')}}</button>
                    <button type="button" class="btn btn-primary" onclick="closeModal()">{{__('Confirm')}}</button>
                </div>
            </div>
        </div>
    </div>
    
    
     <!-- Modal -->
     <div class="modal fade" id="colorSelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"><b>Add Colour Code</b></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form id="addbrand" action="/addColor" method="POST" >
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <div class="col-md-2">
                                            <label><b>{{__('Color Code')}}</b></label>
                                        </div>
                         <div class="col-md-10">               
                  <input type="text" class="form-control mb-3" name="tittle" placeholder="Color Code Eg:#eee" required></div> 
                        
                    
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('cancel')}}</button>
                    <button type="submit" class="btn btn-primary" value="submit" >{{__('Submit')}}</button></button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="brandSelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"><b>Add Brand</b></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form id="addbrand" action="/addBrand" method="POST" enctype="multipart/form-data">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <div class="col-md-2">
                                            <label><b>{{__('TITTLE')}}</b></label>
                                        </div>
                         <div class="col-md-10">               
                  <input type="text" class="form-control mb-3" name="tittle" placeholder="Brand Tittle" required></div> <div class="col-md-2">
                                            <label><b>{{__('NAME')}}</b></label>
                                        </div>
                         <div class="col-md-10">               
                  <input type="text" class="form-control mb-3" name="brand" placeholder="Brand Name" required></div>
                   <div class="col-md-2">
                                            <label><b>{{__('LOGO')}}</b></label>
                                        </div>
                    <div class="col-md-10">
                        <input type="file" name="brand_logo"  class="form-control mb-3"  />
                                      
                                        </div>
                  <div class="col-md-2">
                                            <label><b>{{__('DESCRIPTION')}}</b></label>
                                        </div>
                    <div class="col-md-10">
                 <textarea name="brand_description" rows="8" class="form-control mb-3" placeholder="Brand Discription"></textarea>
                       
                        </div>
                        
                    
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('cancel')}}</button>
                    <button type="submit" class="btn btn-primary" value="submit" >{{__('Submit')}}</button></button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

<!-- <link href="js/product-upload.js" rel='js'> -->
<!-- <script src="<?php // dd(url('/resources/js/product-upload.js'));  ?>"></script> -->

    <script type="text/javascript">
        var category_name = "";
        var subcategory_name = "";
        var subsubcategory_name = "";

        var category_id = null;
        var subcategory_id = null;
        var subsubcategory_id = null;

        $(document).ready(function(){

            $('#usn_tbl').hide();
         
            $('#subcategory_list').hide();
            $('#subsubcategory_list').hide();
            $('#women_Accessories_Handbags_details').hide();
            $('#women_Accessories_Traveller_details').hide();
            $('#women_Accessories_Sunglasses_details').hide();
            $('#women_Accessories_Wallets_Belts_details').hide();
            $('#women_Beauty_Grooming_details').hide();
            $('#women_Ethnic_Wear_Lehenga_details').hide();
            $('#women_Ethnic_Wear_Blouse_details').hide();
            $('#women_Ethnic_Wear_Dhoti_Pants_details').hide();
            $('#women_Ethnic_Wear_DressMaterial_details').hide();
            $('#women_Ethnic_Wear_Dupattas_details').hide();
            $('#women_Ethnic_Wear_Gowns_details').hide();
            $('#women_Ethnic_Wear_KurtaSet_details').hide();
            $('#women_Ethnic_Wear_Palazzos_details').hide();
            $('#women_Ethnic_Wear_Kurtas_details').hide();
            $('#women_Ethnic_Wear_Salwars_details').hide();
            $('#women_Accessories_Saree_Shapewear_details').hide();
            $('#women_Ethnic_Wear_Sarees_details').hide();
            $('#women_Ethnic_Wear_Shararas_details').hide();
            $('#women_Foot_Wear_SportsShoes_details').hide();
            $('#women_Foot_Wear_CasualShoes_details').hide();

            $('#categories').on('change', function() {
      var category_id = this.value;
      $.ajax({
        url: "get_subcategories_by_categoryId",
        type: "POST",
        data: {
          category_id: category_id,_token:'{{ csrf_token() }}'
        },
      
        success: function(dataResult){
            
        //  $("#sub_category").html(dataResult);
            $.each(JSON.parse(dataResult), function(idx, obj) {
           
                $('#sub_category').append('<option value='+obj.id+'>'+obj.name+'</option>');
            
          });
        }
        
      });
    
    
  });
  
   $('#content1').hide();
   $('#content2').hide();
              $('.timespan').click(function () {
               var selected = $(this).val();  
                  if(selected == 'yes') {
                      $('#content2').hide();
                   $('#content1').show();
                   
                  
                } else {
                   $('#content1').hide();
                   $('#content2').show();
                  
                 }
          });   
          
   // var max_fields      = 10; //maximum input boxes allowed
  /*   var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
   var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x ){ //max input box allowed
            x++; //text box increment div class="col-md-2
            $(wrapper).append('<div class="row rows"><div class="col-md-2"><button type="button"  class="btn btn-link btn-icon text-danger"onclick="remove_field(this);"><i class="fa fa-trash-o"></i></button></div><div class="col-md-10"><div class="mb-3"><select class="form-control mb-3 selectpicker" data-placeholder="Select Unit" id="size_unit" name="size_unit"><option value="">{{ ('Select Unit') }}</option><option value="small ">{{ "Small  (S)" }}</option><option value="extra-small">{{ "Extra-Small  (XS)" }}</option><option value="medium">{{ "Medium  (M)" }}</option><option value="large">{{ "Large  (L)" }}</option><option value="extra-large">{{ "Extra-Large  (XL)" }}</option><option value="extra-large">{{"Extra-Extra-Large  (XXL)" }}</option></select></div><input type="text" class="form-control mb-3" name="size[]"placeholder="{{__('Size')}}"/></div></div>'); //add input box
            
        }
    }); */
   
    // $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    //     e.preventDefault(); $(this).parent('div').remove(); x--;
    // })


});

 var size_id = 2;
        function add_field_button(){
            var AddSize =  '<div class="row">';
            AddSize +=  '<div class="col-2">';
            AddSize +=  '<button type="button" onclick="remove_field_size(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            AddSize +=  '</div>';           
            AddSize += '<div class="col-8">';
            AddSize +=  '<input type="text" class="form-control mb-3" name="size[]"placeholder="Size"/></div><div class="col-2"></div>';           
            AddSize +=  '</div>';           
            $('#input_fields_wrap').append(AddSize);

            size_id++;
            
        }
        function remove_field_size(em){
            $(em).closest('.row').remove();
        }
         var color_id = 2;
        function add_field_colour(){
            var AddColor =  '<div class="row">';
            AddColor +=  '<div class="col-2">';
            AddColor +=  '<button type="button" onclick="remove_field_color(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            AddColor +=  '</div><div class="col-md-8"><div class="mb-3"><select class="form-control mb-3 selectpicker colorsnamecode" name="colors[]" id="colorsid" data-placeholder="Select colours"><option value="">Select Colours</option>';
               @foreach (\App\Color::orderBy('name', 'asc')->get() as $key => $color)
              AddColor += '<option value="{{ $color->code}}" style="background-color:{{$color->code}}" data-name="{{$color->name}}" >{{ $color->name}}</option>';
              @endforeach 
              AddColor += '</select></div></div><div class="col-md-2"></div></div>';

             $('#id-colour').append(AddColor);

            color_id++;
            
        }   
        function remove_field_color(em){
            $(em).closest('.row').remove();
        }


  /* function remove_field(em){
        $(em).closest('.rows').remove();
      
      } */

//   $("input").on("change", function() {
            
//           var tot = 0;   
//         tot += parseInt($("#product_commission").val()) + parseInt($("#product_logistic")) + parseInt($("#product_convenience"))+ parseInt($("#product_price"))
//         $("#seller_price").val(tot);
//       });
      
      $("input").on("change", function() {
    var tot = parseInt($("#product_price").val() || '0') + parseInt($("#product_commission").val() || '0')+ parseInt($("#product_logistick").val() || '0') + parseInt($("#product_convenience").val() || '0')
    $("#seller_price").val(tot);
    
     var  gst_total = parseFloat($("#gst").val() || '0') / parseFloat(100);
        var  seller_total= parseFloat(gst_total) * parseFloat($("#seller_price").val() || '0')
        var  display_total= parseFloat(seller_total) + parseFloat($("#seller_price").val() || '0');
       
       $("#display_price").val(parseFloat(display_total.toFixed(2)));
       
       
       var  minus_total = parseFloat($("#mrp").val() || '0') - parseFloat($("#display_price").val() || '0')
        var devide_total= parseFloat(minus_total) / parseFloat($("#mrp").val() || '0')
        var discount_total= parseFloat(devide_total) * parseFloat(100);
       
      if(discount_total!=isNaN){ 
        
      $("#discount").val(parseFloat(discount_total));
      $("#product_discount").val(parseFloat(discount_total));
      
      }
  });
    function update_price(){
       $('.price_class').html($('#product_price').val());

    }
 

    totalrow = 1000;
  function add_field_variant() { 
    $('#usn_bdy').empty();
       $('#usn_tbl').show();
    //  var choice = document.getElementsByName('choice_options[]');
      var size = document.getElementsByName('size[]');
      var colors = document.getElementsByName('colors[]');
      var group_id = document.getElementById('group_id').value;
    var myElements = $(".colorsnamecode option:selected");

             var addrow='';
      
              for(var i=0; i < colors.length; i++){
              for(var j=0; j < size.length; j++){
        
        for (var i=0;i<myElements.length;i++) {
     
                totalrow++;
                
            var a = colors[i];

            addrow = '<tr id='+totalrow+'><td style="width:10%;" ><input type="text" name="product_id" id="product_id"> </td><td class="text-center"><center><div class="box"style="background-color:'+a.value+'"></div></center>'+myElements.eq(i).attr("data-name")+'</td><td class="text-center">'; 
                  var b = size[j];
                  addrow = addrow + b.value+'</td><td style="width:10%;" ><input type="text" name="sku_id" id="sku_id"> </td><td style="width:10%;" ><input type="text" name="quantity" id="quantity"> </td><td class="text-center" style="width:10%;"><span class=" badge badge-md badge-pill bg-red" id="span_outstock'+totalrow+'">Out of stock</span><span style="display:none" class="badge badge-md badge-pill bg-green replaceme" id="span_instock'+totalrow+'">In stock</span><div class="col-4 col-xl-1 col-md-2 order-2 order-md-0" style="margin-top:.5rem;"><label class="switch" style="margin-top:5px;"><input  type="checkbox" class="stock_details" name="stock_details'+totalrow+'" id="stock_details'+totalrow+'" onclick="update_checked('+totalrow+')"><span class="slider round"></span></label></div></td></tr>';
                  $('#usn_bdy').append(addrow);   

          }

                //}

              }

            }  
                 
 }   
 

  $('#product_price').change(function () { 
$('#group_id').change(function (){});
 });   
   function update_checked(row_id) {

  var checkBox = document.getElementById("stock_details"+row_id);
  //alert(checkBox.checked);
  if (checkBox.checked == true){
    $('#span_instock'+row_id).show();
    $('#span_outstock'+row_id).hide();
    //$('.replaceme').html('<span class="badge badge-md badge-pill bg-green replaceme">In stock</span>');

  } else {
    $('#span_outstock'+row_id).show();
    $('#span_instock'+row_id).hide();
   //$('.replaceme').html('<span class="badge badge-md badge-pill bg-red replaceme">Out of stock</span>');
  }
}  
      
      
        
        function list_item_highlight(el){
            $(el).parent().children().each(function(){
                $(this).removeClass('selected');
            });
            $(el).addClass('selected');
        }

        function get_subcategories_by_category(el, cat_id){
            list_item_highlight(el);
            category_id = cat_id;
            subcategory_id = null;
            subsubcategory_id = null;
            category_name = $(el).html();
            $('#subcategories').html(null);
            $('#subsubcategory_list').hide();
            $.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                for (var i = 0; i < data.length; i++) {
                    $('#subcategories').append('<li onclick="get_subsubcategories_by_subcategory(this, '+data[i].id+')">'+data[i].name+'</li>');
          
                }
                $('#subcategory_list').show();
            });
        }

        function get_subsubcategories_by_subcategory(el, subcat_id){
            list_item_highlight(el);
            subcategory_id = subcat_id; 
      
      
            subsubcategory_id = null;
            subcategory_name = $(el).html();
      
      
      if(subcategory_name=="Mobile" || subcategory_name=="Mobiles" ){
        //alert("hi..");
        
        $('#laptop_Product_desc_details').hide();
        $('#mobile_Product_desc_details').show();
        
        
      }
      if(subcategory_name=="Laptop" || subcategory_name=="Laptops" ){
        //alert("hi..");
        
        $('#mobile_Product_desc_details').hide();
        $('#laptop_Product_desc_details').show();
        
        
      }
            $('#subsubcategories').html(null);
            $.post('{{ route('subsubcategories.get_subsubcategories_by_subcategory') }}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory_id}, function(data){
                for (var i = 0; i < data.length; i++) {
                    $('#subsubcategories').append('<li onclick="confirm_subsubcategory(this, '+data[i].id+')">'+data[i].name+'</li>');
                }
                $('#subsubcategory_list').show();
            });
        }

        function confirm_subsubcategory(el, subsubcat_id){
            list_item_highlight(el);
            subsubcategory_id = subsubcat_id;
            subsubcategory_name = $(el).html();
     

      var sub_sub_catagory=subsubcategory_name;
      
     
      }

        function get_attributes_by_subsubcategory(subsubcategory_id){
        $.post('{{ route('subsubcategories.get_attributes_by_subsubcategory') }}',{_token:'{{ csrf_token() }}', subsubcategory_id:subsubcategory_id}, function(data){
            $('#choice_attributes').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#choice_attributes').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
        });
      }

        function filterListItems(el, list){
            filter = el.value.toUpperCase();
            li = $('#'+list).children();
            for (i = 0; i < li.length; i++) {
                if ($(li[i]).html().toUpperCase().indexOf(filter) > -1) {
                    $(li[i]).show();
                } else {
                    $(li[i]).hide();
                }
            }
        }
        $(function () {
  $('#addbrand').on('submit',function(e)
  {
    
    e.preventDefault()
    $.ajax({
      url: 'addBrand',
      type: 'post',
      data: new FormData(this),
      catch : false,
      contentType:false,      
      processData: false,
      Async:false,      
      success: function(data)
      {
        if(data==1)
        {
          alert("Brand Sent Successfully..");
          window.location.reload();
        }
        else
        {
          alert("Brand Not Added..");
          window.location.reload();
          
        }
      }
    });
  });
  });

        function closeModal(){
            if(category_id > 0 && subcategory_id > 0){
                $('#category_id').val(category_id);
                $('#subcategory_id').val(subcategory_id);
                $('#subsubcategory_id').val(subsubcategory_id);
                $('#product_category').html(category_name+'>'+subcategory_name+'>'+subsubcategory_name);
                $('#categorySelectModal').modal('hide');
                $('#women_Accessories_Sunglasses_details').hide();
                $('#women_Accessories_Handbags_details').hide();
                $('#women_Accessories_Traveller_details').hide();
                $('#women_Accessories_Wallets_Belts_details').hide();
                $('#women_Beauty_Grooming_details').hide();
                $('#women_Ethnic_Wear_Lehenga_details').hide();
                $('#women_Ethnic_Wear_Blouse_details').hide();
                $('#women_Ethnic_Wear_Dhoti_Pants_details').hide();
                $('#women_Ethnic_Wear_DressMaterial_details').hide();
                $('#women_Ethnic_Wear_Dupattas_details').hide();
                $('#women_Ethnic_Wear_Gowns_details').hide();
                $('#women_Ethnic_Wear_KurtaSet_details').hide();
                $('#women_Ethnic_Wear_Palazzos_details').hide();
                $('#women_Ethnic_Wear_Kurtas_details').hide();
                $('#women_Ethnic_Wear_Salwars_details').hide();
                $('#women_Accessories_Saree_Shapewear_details').hide();
                $('#women_Ethnic_Wear_Sarees_details').hide();
                $('#women_Ethnic_Wear_Shararas_details').hide();
                $('#women_Foot_Wear_SportsShoes_details').hide();
                $('#women_Foot_Wear_CasualShoes_details').hide();
                

				if(category_name=="Women" && subcategory_name=="Accessories" && subsubcategory_name=="Wallets &amp; Belts" || subsubcategory_name=="Wallets&amp;Belts"){
					$('#women_Accessories_Wallets_Belts_details').show();
				}
        if(category_name=="Women" && subcategory_name=="Ethnic Wear" && subsubcategory_name=="Saree Shapewear &amp; Petticoats" || subsubcategory_name=="Saree Shapewear&amp;Petticoats"){
          $('#women_Accessories_Saree_Shapewear_details').show();
        }
        if(category_name=="Women" && subcategory_name=="Ethnic Wear" && subsubcategory_name=="Dhoti Pants"){
          $('#women_Ethnic_Wear_Dhoti_Pants_details').show();
        }

				$.ajax({
           type:"GET",
           url:'get_subcategory_specifications',
           data:'&category_id='+category_id+'&subcategory_id='+subcategory_id+'&subsubcategory_id='+subsubcategory_id+'&subcategory_name='+subcategory_name+'&sub_subcategory_name='+subsubcategory_name+'&category_name='+category_name,
		   
        success: function(data){
				
				if(data.type=="Dupattas")
				{

          for (var i = 0; i < data.res.length; i++) 
          {
            
            var pattern=data.res[i].Pattern; 

            var splits11=pattern.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_Dupattas_Pattern').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }            
            
            $('#women_Ethnic_Wear_Dupattas_details').show(); 
          }
        }
        if(data.type=="SportsShoes")
        {

          for (var i = 0; i < data.res.length; i++) 
          {
            
            var type=data.res[i].Type; 

            var splits11=type.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_SportsShoes_type').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }            
            
            $('#women_Foot_Wear_SportsShoes_details').show(); 
          }
        }
        if(data.type=="CasualShoes")
        {

          for (var i = 0; i < data.res.length; i++) 
          {
            
            var type=data.res[i].Type; 
            var occasion=data.res[i].Occasion; 

            var splits11=type.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Foot_Wear_CasualShoes_type').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            } 

            var splits12=occasion.split(",");
            for (var ya = 0; ya < splits12.length; ya++)
            {                  
              $('#women_Foot_Wear_CasualShoes_Occasion').append('<option value='+splits12[ya]+'>'+splits12[ya]+'</option>');
                   
            }            
            
            $('#women_Foot_Wear_CasualShoes_details').show(); 
          }
        }

        if(data.type=="KurtaSet")
        {

          for (var i = 0; i < data.res.length; i++) 
          {                     
            var occasion=data.res[i].Occasion;
            var sleeve_lenght=data.res[i].Sleeve_lenght;            
            var pattern=data.res[i].Pattern;            
            
        
            var splits12=occasion.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Ethnic_Wear_KurtaSet_Occasion').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            } 
            var splits11=sleeve_lenght.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_KurtaSet_Sleeve_length').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }           
            var splits15=pattern.split(",");
            for (var ya = 0; ya < splits15.length; ya++)
            {                  
              $('#women_Ethnic_Wear_KurtaSet_pattern').append('<option value='+splits15[ya]+'>'+splits15[ya]+'</option>');
                   
            }
            
            $('#women_Ethnic_Wear_KurtaSet_details').show(); 
          }
        } 
        if(data.type=="Gowns")
        {

          for (var i = 0; i < data.res.length; i++) 
          {

            var type=data.res[i].Type;          
            var occasion=data.res[i].Occasion;
            var sleeve_lenght=data.res[i].Sleeve_lenght;            
            
        
            var splits12=occasion.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Ethnic_Wear_Gowns_Occasion').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            } 
            var splits11=sleeve_lenght.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_Gowns_Sleeve_length').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }
            var splits13=type.split(",");
            for (var z = 0; z < splits13.length; z++)
            {                   
              $('#women_Ethnic_Wear_Gowns_type').append('<option value='+splits13[z]+'>'+splits13[z]+'</option>');
                   
            }
            
            $('#women_Ethnic_Wear_Gowns_details').show(); 
          }
        } 
        if(data.type=="DressMaterial")
        {

          for (var i = 0; i < data.res.length; i++) 
          {

            var type=data.res[i].Type;          
            var occasion=data.res[i].Occasion;
            var pattern=data.res[i].Pattern;            
            
        
            var splits12=occasion.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Ethnic_Wear_DressMaterial_Occasion').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            } 
            var splits11=pattern.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_DressMaterial_pattern').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }
            var splits13=type.split(",");
            for (var z = 0; z < splits13.length; z++)
            {                   
              $('#women_Ethnic_Wear_DressMaterial_type').append('<option value='+splits13[z]+'>'+splits13[z]+'</option>');
                   
            }
            
            $('#women_Ethnic_Wear_DressMaterial_details').show(); 
          }
        }
        if(data.type=="Palazzos")
        {

          for (var i = 0; i < data.res.length; i++) 
          {

            var suitable_for=data.res[i].Suitable_for;          
            var occasion=data.res[i].Occasion;
            var pattern=data.res[i].Pattern;            
            
        
            var splits12=occasion.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Ethnic_Wear_Palazzos_Occasion').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            } 
            var splits11=pattern.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_Palazzos_pattern').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }
            var splits13=suitable_for.split(",");
            for (var z = 0; z < splits13.length; z++)
            {                   
              $('#women_Ethnic_Wear_Palazzos_suitable_for').append('<option value='+splits13[z]+'>'+splits13[z]+'</option>');
                   
            }
            
            $('#women_Ethnic_Wear_Palazzos_details').show(); 
          }
        }
        if(data.type=="Salwars")
        {

          for (var i = 0; i < data.res.length; i++) 
          {

            var suitable_for=data.res[i].Suitable_for;          
            var occasion=data.res[i].Occasion;
            var pattern=data.res[i].Pattern;            
            
        
            var splits12=occasion.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Ethnic_Wear_Salwars_Occasion').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            } 
            var splits11=pattern.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_Salwars_pattern').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }
            var splits13=suitable_for.split(",");
            for (var z = 0; z < splits13.length; z++)
            {                   
              $('#women_Ethnic_Wear_Salwars_suitable_for').append('<option value='+splits13[z]+'>'+splits13[z]+'</option>');
                   
            }
            
            $('#women_Ethnic_Wear_Salwars_details').show(); 
          }
        }
        if(data.type=="Shararas")
        {

          for (var i = 0; i < data.res.length; i++) 
          {

            var suitable_for=data.res[i].Suitable_for;          
            var occasion=data.res[i].Occasion;
            var pattern=data.res[i].Pattern;            
            
        
            var splits12=occasion.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Ethnic_Wear_Shararas_Occasion').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            } 
            var splits11=pattern.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_Shararas_pattern').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }
            var splits13=suitable_for.split(",");
            for (var z = 0; z < splits13.length; z++)
            {                   
              $('#women_Ethnic_Wear_Shararas_suitable_for').append('<option value='+splits13[z]+'>'+splits13[z]+'</option>');
                   
            }
            
            $('#women_Ethnic_Wear_Shararas_details').show(); 
          }
        }
        if(data.type=="Blouse")
        {

          for (var i = 0; i < data.res.length; i++) 
          {

            var closure_type=data.res[i].Closure_type;
            var neck=data.res[i].Neck;
            var occasion=data.res[i].Occasion;
            var pattern=data.res[i].Pattern;            
            
        
            var splits12=occasion.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Ethnic_Wear_Blouse_Occasion').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            } 
            var splits11=pattern.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_Blouse_pattern').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }
            var splits13=closure_type.split(",");
            for (var z = 0; z < splits13.length; z++)
            {                   
              $('#women_Ethnic_Wear_Blouse_closure_type').append('<option value='+splits13[z]+'>'+splits13[z]+'</option>');
                   
            }
            var splits14=neck.split(",");
            for (var za = 0; za < splits14.length; za++)
            {         

              $('#women_Ethnic_Wear_Blouse_neck').append('<option value='+splits14[za]+'>'+splits14[za]+'</option>');
                   
            }
            
            $('#women_Ethnic_Wear_Blouse_details').show(); 
          }
        }
        if(data.type=="Lehenga")
        {

          for (var i = 0; i < data.res.length; i++) 
          {

            var occasion=data.res[i].Occasion;
            var pattern=data.res[i].Pattern;
            var sleeve=data.res[i].Sleeve;
            var theme=data.res[i].Theme;
            var type=data.res[i].Type;
            
        
            var splits12=occasion.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Ethnic_Wear_Lehenga_Occasion').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            } 
            var splits11=pattern.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_Lehenga_pattern').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }
            var splits13=sleeve.split(",");
            for (var z = 0; z < splits13.length; z++)
            {                   
              $('#women_Ethnic_Wear_Lehenga_sleeve').append('<option value='+splits13[z]+'>'+splits13[z]+'</option>');
                   
            }
            var splits14=theme.split(",");
            for (var za = 0; za < splits14.length; za++)
            {         

              $('#women_Ethnic_Wear_Lehenga_theme').append('<option value='+splits14[za]+'>'+splits14[za]+'</option>');
                   
            }
            var splits15=type.split(",");
            for (var zb = 0; zb < splits15.length; zb++)
            {                    
              $('#women_Ethnic_Wear_Lehenga_type').append('<option value='+splits15[zb]+'>'+splits15[zb]+'</option>');
                   
            }
            $('#women_Ethnic_Wear_Lehenga_details').show(); 
          }
        }
        if(data.type=="Sarees")
        {

          for (var i = 0; i < data.res.length; i++) 
          {
            var occasion=data.res[i].Occasion;            
            var saree_style=data.res[i].saree_style;

            var splits12=occasion.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Ethnic_Wear_Sarees_Occasion').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            } 
            
            var splits13=saree_style.split(",");
            for (var z = 0; z < splits13.length; z++)
            {                   
              $('#women_Ethnic_Wear_Sarees_Style').append('<option value='+splits13[z]+'>'+splits13[z]+'</option>');
                   
            }
           
           
            $('#women_Ethnic_Wear_Sarees_details').show(); 
          }
        }

        if(data.type=="Kurtas")
        {

          for (var i = 0; i < data.res.length; i++) 
          {

            var occasion=data.res[i].Occasion;
            var pattern=data.res[i].Pattern;
            var sleeve_lenght=data.res[i].Sleeve_lenght;
            var lenght_l=data.res[i].Lenght;
            var type=data.res[i].Type;
            
        
            var splits12=occasion.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Ethnic_Wear_Kurtas_Occasion').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            } 
            var splits11=pattern.split(",");
            for (var y = 0; y < splits11.length; y++)
            {                  
              $('#women_Ethnic_Wear_Kurtas_pattern').append('<option value='+splits11[y]+'>'+splits11[y]+'</option>');
                   
            }
            var splits13=sleeve_lenght.split(",");
            for (var z = 0; z < splits13.length; z++)
            {                   
              $('#women_Ethnic_Wear_Kurtas_sleeve_lenght').append('<option value='+splits13[z]+'>'+splits13[z]+'</option>');
                   
            }
            var splits14=lenght_l.split(",");
            for (var za = 0; za < splits14.length; za++)
            {         

              $('#women_Ethnic_Wear_Kurtas_lenght').append('<option value='+splits14[za]+'>'+splits14[za]+'</option>');
                   
            }
            var splits15=type.split(",");
            for (var zb = 0; zb < splits15.length; zb++)
            {                    
              $('#women_Ethnic_Wear_Kurtas_type').append('<option value='+splits15[zb]+'>'+splits15[zb]+'</option>');
                   
            }
            $('#women_Ethnic_Wear_Kurtas_details').show(); 
          }
        }

        if(data.type=="BeautyGrooming")
        {

          for (var i = 0; i < data.res.length; i++) 
          {

            var bathSpaIdeal_for=data.res[i].Ideal_for;
            $('#women_Beauty_Grooming_Ideal_for').empty();
        
            var splits12=bathSpaIdeal_for.split(",");
            for (var x = 0; x < splits12.length; x++)
            {                   
              $('#women_Beauty_Grooming_Ideal_for').append('<option value='+splits12[x]+'>'+splits12[x]+'</option>');
                   
            }
            $('#women_Beauty_Grooming_details').show(); 
          }
        }
				if(data.type=="Sunglasses")
				{
          for (var i = 0; i < data.res.length; i++) 
          {
  					var   sunglassesTypeFrame_Color=data.res[i].Frame_Color;
  					var   sunglassesTypeFace_shape=data.res[i].Face_shape;
  					var   sunglassesTypeFrame_material=data.res[i].Frame_material;
  					var   sunglassesTypeIdeal_for=data.res[i].Ideal_for;
  					var   sunglassesTypeLens_Color=data.res[i].Lens_Color;
  					var   sunglassesTypeLens_Feature=data.res[i].Lens_Feature;
  					var   sunglassesTypeLens_Material=data.res[i].Lens_Material;
  					var   sunglassesTypeSize=data.res[i].Size;
  					var   sunglassesStyle=data.res[i].Style;
  					var   sunglassesUsage=data.res[i].Usage;

            var splits1=sunglassesTypeFace_shape.split(",");
  				  for (var l = 0; l < splits1.length; l++)
  				  {						 
  				   $('#women_Accessories_Sunglasses_Face_shape').append('<option value='+splits1[l]+'>'+splits1[l]+'</option>');
                     
            }
                var splits2=sunglassesTypeFrame_Color.split(",");
  				  for (var m = 0; m < splits2.length; m++)
  				  {						 
  				   $('#women_Accessories_Sunglasses_Frame_Color').append('<option value='+splits2[m]+'>'+splits2[m]+'</option>');
                     
            }
            var splits3=sunglassesTypeFrame_material.split(",");
            for (var q = 0; q < splits3.length; q++)
            {                      
             $('#women_Accessories_Sunglasses_Frame_Material').append('<option value='+splits3[q]+'>'+splits3[q]+'</option>');
             
            }
            var splits4=sunglassesTypeIdeal_for.split(",");
            for (var p = 0; p < splits4.length; p++)
            {                      
             $('#women_Accessories_Sunglasses_Ideal_for').append('<option value='+splits4[p]+'>'+splits4[p]+'</option>');
             
            }

            var splits5=sunglassesTypeLens_Color.split(",");
            for (var n = 0; n < splits5.length; n++)
            {                      
             $('#women_Accessories_Sunglasses_Lens_Color').append('<option value='+splits5[n]+'>'+splits5[n]+'</option>');
             
            }
            var splits6=sunglassesTypeLens_Feature.split(",");
            for (var o = 0; o < splits6.length; o++)
            {                      
             $('#women_Accessories_Sunglasses_Lens_Feature').append('<option value='+splits6[o]+'>'+splits6[o]+'</option>');
             
            }
            var splits7=sunglassesTypeLens_Material.split(",");
            for (var r = 0; r < splits7.length; r++)
            {                      
             $('#women_Accessories_Sunglasses_Lens_Material').append('<option value='+splits7[r]+'>'+splits7[r]+'</option>');
             
            }

            var splits8=sunglassesTypeSize.split(",");
            for (var s = 0; s < splits8.length; s++)
            {                      
             $('#women_Accessories_Sunglasses_Size').append('<option value='+splits8[s]+'>'+splits8[s]+'</option>');
             
            }
            var splits9=sunglassesUsage.split(",");
            for (var t = 0; t < splits9.length; t++)
            {                      
             $('#women_Accessories_Sunglasses_Usage').append('<option value='+splits9[t]+'>'+splits9[t]+'</option>');
             
            }
            var splits11=sunglassesStyle.split(",");
            for (var u = 0; u < splits11.length; u++)
            {                      
             $('#women_Accessories_Sunglasses_Style').append('<option value='+splits11[u]+'>'+splits11[u]+'</option>');
             
            }
           $('#women_Accessories_Sunglasses_details').show();
          }
         }       
				if(data.type == 'Handbags')
				{
          for (var i = 0; i < data.res.length; i++) 
          {
            var  occasionType=data.res[i].Occasion;
				    var splits=occasionType.split(",");
				   for (var j = 0; j < splits.length; j++)
				   {						 
				     $('#women_Accessories_Handbags_Occasion').append('<option value='+splits[j]+'>'+splits[j]+'</option>');
                   
           }
                 $('#women_Accessories_Handbags_details').show();
          }
        }
        if(data.type == 'Traveller')
				{
          for (var i = 0; i < data.res.length; i++) 
          {
            var   travellerType=data.res[i].Type;
				    var splits=travellerType.split(",");
				   for (var k = 0; k < splits.length; k++)
				   {						 
				      $('#women_Accessories_Traveller_type').append('<option value='+splits[k]+'>'+splits[k]+'</option>');
                   
           }
                 $('#women_Accessories_Traveller_details').show();
        }
      }
               
      }      
         });
            }
            else{
                alert('Please choose categories...');
                // console.log(category_id);
                // console.log(subcategory_id);
                // console.log(subsubcategory_id);
            }
        }

        var i = 0;
        function add_more_customer_choice_option(i, name){
        $('#customer_choice_options').append('<div class="row mb-3"><div class="col-8 col-md-3 order-1 order-md-0"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="Choice Title" readonly></div><div class="col-12 col-md-7 col-xl-8 order-3 order-md-0 mt-2 mt-md-0"><input type="text" class="form-control tagsInput choice-values" name="choice_options_'+i+'[]" placeholder="Enter choice values" onchange="update_sku()"></div><div class="col-4 col-xl-1 col-md-2 order-2 order-md-0 text-right"><button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button></div></div>');
         i++;
            $('.tagsInput').tagsinput('items');
      }

      $('input[name="colors_active"]').on('change', function() {
          if(!$('input[name="colors_active"]').is(':checked')){
          $('#colors').prop('disabled', true);
        }
        else{
          $('#colors').prop('disabled', false);
        }
        update_sku();
      });

      $('#colors').on('change', function() {
          update_sku();
      });

      $('input[name="unit_price"]').on('keyup', function() {
          update_sku();
      });

        $('input[name="name"]').on('keyup', function() {
          update_sku();
      });

        $('#choice_attributes').on('change', function() {
        $('#customer_choice_options').html(null);
        $.each($("#choice_attributes option:selected"), function(){
                add_more_customer_choice_option($(this).val(), $(this).text());
            });
        update_sku();
      });

      function delete_row(em){
        $(em).closest('.row').remove();
        update_sku();
      }

      function update_sku(){
          
            $.ajax({
           type:"POST",
           url:'{{ route('products.sku_combination') }}',
           data:$('#choice_form').serialize(),
           success: function(data){
             $('#sku_combination').html(data);
             if (data.length > 1) {
               $('#quantity').hide();
             }
             else {
                $('#quantity').show();
             }
           }
         });
      }
      
        var photo_id = 2;
        function add_more_slider_image(){
      if(photo_id!=6){
            var photoAdd =  '<div class="row">';
            photoAdd +=  '<div class="col-2">';
            photoAdd +=  '<button type="button" onclick="delete_this_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            photoAdd +=  '</div>';
            photoAdd +=  '<div class="col-10">';
            photoAdd +=  '<input type="file" name="photos[]" id="photos-'+photo_id+'" class="custom-input-file custom-input-file--4 multiImage" data-multiple-caption="{count} files selected" multiple accept="image/*" />';
            photoAdd +=  '<label for="photos-'+photo_id+'" class="mw-100 mb-3">';
            photoAdd +=  '<span></span>';
            photoAdd +=  '<strong>';
            photoAdd +=  '<i class="fa fa-upload"></i>';
            photoAdd +=  "{{__('Choose image')}}";
            photoAdd +=  '</strong>';
            photoAdd +=  '</label>';
            photoAdd +=  '</div>';
            photoAdd +=  '</div>';
            $('#product-images').append(photoAdd);

            photo_id++;
            imageInputInitialize();
      }
        }
        function delete_this_row(em){
            $(em).closest('.row').remove();
        }


        var file_id=1;
      if (window.File && window.FileList && window.FileReader) {
      $("#photos-1").on("change", function(e) {     

      var files = e.target.files,
        filesLength = files.length;   
        if(file_id<=4){    
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\"><i class='fa fa-window-close' aria-hidden='true'></i></span>" +
            "</span>").insertBefore("#photos-1");
          file_id++;
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
           // file_id--;
      $("#img_count").empty();
       var el = $('.pip');
      file_id =el.length;
      
      var count_left= 5-file_id;
       $("#img_count").append('<b>Choose<b style="color:red;"> '+ count_left +' </b> More Images</b>');
            
          });

           
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
       
        fileReader.readAsDataURL(f);
        var el = $('.pip');
      file_id =el.length;
      var count_more=file_id+1;
      var coun_left=5-count_more;
      $("#img_count").empty();
      if(coun_left!=0){
         $("#img_count").append('<b>Choose<b style="color:red;"> '+ coun_left +' </b> More Images</b>');
      }else {
           $("#img_count").append('<b>You Choosed All 5 Images</b>');
          }
         
      }
  }  else {
    alert("maximum 5 Images..")
  }
    });
       } else {
    alert("Your browser doesn't support to File API")
  }

 
    </script>
@endsection