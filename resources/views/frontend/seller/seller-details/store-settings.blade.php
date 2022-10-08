@extends('frontend.layouts.app')
<style>
   .ex-img{
   height: 100px;
   width: 100px;
   background-position:center;
   background-size: 100% 100%; 
   max-width:100px;
   }
   .add-proof {display: none;}
   #aadhar {display: block;}
   .invalid-feedback{
   display:block;
   }
   .required {
   color: red;
   }
</style>

@section('content')
<section class="gry-bg py-4 profile">
   <div class="container">
      <div class="row cols-xs-space cols-sm-space cols-md-space">
         <div class="col-lg-3 d-none d-lg-block">
            @include('frontend.inc.seller_side_nav')
         </div>
         @php
         $seller = \App\Seller::where('user_id', Auth::user()->id)->first();
         $sellerDetail = \App\SellerDetail::where('user_id', Auth::user()->id)->first();
         @endphp
         <div class="col-lg-9">
            <div class="card no-border mt-5">
               <div class="card-header py-3">
               <div class="row">
                  <h4 class="mb-0 h6 font-weight-bold">Store Details</h4>
				  	<b> <a href="{{ route('home') }}" style="margin-left:1rem;">{{__('>Home')}}</a></b>
                                      <b> <a href="{{ route('dashboard') }}">{{__('>Dashboard')}}</a></b> 
               </div>
               </div>
               <div class="card-body">
                   <style>
                       .form_design input,.form_design select,.form_design textarea{margin-bottom:15px;}
                       .form_design label{font-weight:600;}
                   </style>
               <form id="store-details" method="POST" action="{{ route('seller-store-details') }}" enctype="multipart/form-data" class="form_design">
                     @csrf
                    
                     <div class="row mt-3">
                     <input type="hidden" class="form-control mb-3" name="update"  value="true" >
                        <div class="col-md-12">
                           <div class="col">
                              <label>Type <span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                           <select class="form-control" name="store_type" disabled>
                                 <option value="company" @if ($sellerDetail->company_type == "company") {{ 'selected' }} @endif>Company</option>
                                 <option value="proprietor" @if ($sellerDetail->company_type == "proprietor") {{ 'selected' }} @endif>Proprietor</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>Store name<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input name="store_name" type="text" class="form-control mb-3" disabled placeholder="" value="{{ $sellerDetail->store_name }}" >
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>Mobile number<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text"  disabled name="mobile"  class="form-control mb-3" placeholder="" value="{{ $sellerDetail->store_mobile }}" >
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>Email address<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text" disabled name="email" class="form-control mb-3" placeholder="" value="{{ $sellerDetail->store_email }}" >
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>Pan card number<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text" name="pan_card_number" class="form-control mb-3" disabled placeholder="" value="{{ $sellerDetail->pan_card_number }}">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>GSTIN<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text" name="store_gst" class="form-control mb-3" disabled placeholder="" value="{{ $sellerDetail->store_gst_in }}" >
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>TAN<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text" name="store_tan"  class="form-control mb-3" disabled placeholder="" value="{{ $sellerDetail->store_tan_no }}" >
                           </div>
                        </div>
                         <div class="col-md-12"><div class="col-md-12 mt-3 mb-2 font-weight-bold" style="color:#737373;font-size:14px;">Store Address Detail:</div></div>
                        <div class="col-md-12">
                           <div class="col">
                              <label>Address<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              {{-- <input type="text" class="form-control mb-3" placeholder="" value="" > --}}
                              <textarea  name="store_address" id="store_address" disabled cols="20" rows="1" class="form-control" >
                                 {{ $sellerDetail->store_address }}
                              </textarea>
                           </div>
                        </div>
                        

                        <div class="col-md-4">
                           <div class="col">
                              <label>City<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text" name="store_address_city"  disabled class="form-control mb-3" placeholder="" value="{{ $sellerDetail->store_address_city }}" disabled>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>State<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text" name="store_address_state"  disabled class="form-control mb-3" placeholder="" value="{{ $sellerDetail->store_address_state }}" disabled>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>Pincode<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text" name="store_address_pincode"  disabled class="form-control mb-3" placeholder="" value="{{ $sellerDetail->store_address_pincode }}" disabled>
                           </div>
                        </div>
                        <div class="col-md-12"><div class="col-md-12 mt-3 mb-2 font-weight-bold" style="color:#737373;font-size:14px;">Pickup Details:</div></div>
                        <div class="col-md-12">
                           <div class="col">
                              <label>Address<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              {{-- <input type="text" class="form-control mb-3" placeholder="" value="" > --}}
                              <textarea id="add" name="pick_up_address" cols="20" disabled rows="1" class="form-control" >
                                 {{ $sellerDetail->pick_up_address }}
                              </textarea>
                           </div>
                        </div>
                        
                        <div class="col-md-4">
                           <div class="col">
                              <label>City<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text" name="pick_up_address_city"  disabled class="form-control mb-3" placeholder="" value="{{ $sellerDetail->pick_up_address_city }}" disabled>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>State<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text" name="pick_up_address_state"  disabled class="form-control mb-3" placeholder="" value="{{ $sellerDetail->pick_up_address_state }}" disabled>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>Pincode<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                              <input type="text" name="pick_up_address_pincode"  disabled class="form-control mb-3" placeholder="" value="{{ $sellerDetail->pick_up_address_pincode }}" disabled>
                           </div>
                        </div>
                     </div>
                     {{-- 
                     <div class="col font-weight-bold strong-700 mt-3">Pick up address</div>
                     --}}
                     {{-- 
                     <h4 class="mb-0 h6 font-weight-bold">Store address</h4>
                     --}}
                     {{-- 
                     <div class="col-md-6">
                        <div class="col">
                           <label>Street address</label>
                        </div>
                        <div class="col-md-10">
                           <input type="text" class="form-control mb-3" placeholder="" value="" >
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="col">
                           <label>City</label>
                        </div>
                        <div class="col-md-10">
                           <input type="text" class="form-control mb-3" placeholder="" value="" >
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="col">
                           <label>State</label>
                        </div>
                        <div class="col-md-10">
                           <input type="text" class="form-control mb-3" placeholder="" value="" >
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="col">
                           <label>Country</label>
                        </div>
                        <div class="col-md-10">
                           <input type="text" class="form-control mb-3" placeholder="" value="" >
                        </div>
                     </div>
                     --}}
                     {{-- //Store logo  --}}
                     <div class="col-md-12"><div class="mt-3 mb-2 font-weight-bold" style="color:#737373;font-size:14px;">Photo Proof:</div></div>
                     <div class="row mt-3">
                         
                        <div class="col-md-4">
                           <div class="col">
                              <label>Store logo<span class="required">*</span></label>
                           </div>
                           
                               <div class="col-md-12"><img  style="background-image:url('{{ asset($sellerDetail->store_logo) }}')" alt="" class="ex-img"></div>
                               <input type="file" name="store_logo" id="file-11" diabled class="form-control mt-1"  accept="image/*">
                           
                        </div>
                        {{-- Store address photo proof  --}}
                         <div class="col-md-4">
                           <div class="col">
                              <label>Store address photo proof<span class="required">*</span></label>
                           </div>
                           <div class="col-md-10">
                               <img  style="background-image:url('{{ asset($sellerDetail->store_address_photo_proof) }}')" alt="" class="ex-img">
                              <input type="file" name="store_address_proof" disabled id="file-1" class="form-control mt-1" accept="image/*">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="col">
                              <label>Pan Card<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                               <img  style="background-image:url('{{ asset($sellerDetail->pan_card) }}')" alt="" class="ex-img">
                              <input type="file" name="pan_card" id="file-2" disabled class="form-control mt-1" accept="image/*">
                           </div>
                        </div>
                     </div>
                     
                    
                     
                     <div class="col-md-12 text-center">
           
                        <a
                        href="javascript:void(0)" 
                            class="btn btn-styled btn-base-1 mt-3"
                            onclick="storeDetailsEnables()"
                            >Edit</a
                          >
                        <a
                              href="javascript:void(0)"
                              onclick="document.getElementById('store-details').submit()"
                                  class="btn btn-styled btn-base-1 mt-3"
                                  >Update</a
                                >
                        {{-- <a href="#" class="btn btn-styled btn-base-1 mt-3">Save</a> --}}
                     </div>
               </div>
               </form>
            </div>
            <div class="card no-border mt-5">
               <div class="card-header py-3">
                  <h4 class="mb-0 h6 font-weight-bold">Seller Details</h4>
               </div>
               <div class="card-body">
               <form id="seller-details" method="POST" action="{{ route('seller-details') }}"  enctype="multipart/form-data" class="form_design">
               @csrf
                  <div class="row">
                  <input type="hidden" class="form-control mb-3" name="update"  value="true" >
                     <div class="col-md-6">
                        <div>
                           <div class="col">
                              <label>First name<span class="required">*</span></label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" disabled name="first_name" placeholder="" value="{{ $sellerDetail->seller_first_name }}" >
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="col">
                           <label>Last name<span class="required">*</span></label>
                        </div>
                        <div class="col-md-10">
                           <input type="text" class="form-control mb-3" disabled placeholder="" name="second_name" value="{{ $sellerDetail->seller_second_name }}">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="col">
                           <label>Email address<span class="required">*</span></label>
                        </div>
                        <div class="col-md-12">
                           <input type="text" class="form-control mb-3" disabled placeholder="" name="email" value="{{ $sellerDetail->seller_email }}" >
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="col">
                           <label>Mobile number<span class="required">*</span></label>
                        </div>
                        <div class="col-md-12">
                           <input type="text" class="form-control mb-3" disabled placeholder="" name="mobile" value="{{ $sellerDetail->seller_mobile }}" >
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="col">
                           <label for="input">Select proof of Address <span class="required">*</span>
                           </label>
                        </div>
                        <div class="col-md-12">
                        <select class="form-control" id="address-proof" disabled  name="residental_address_proof_type">
   <option value="aadhar_card" @if ($sellerDetail->seller_proof_of_address_type == "aadhar_card") {{ 'selected' }} @endif>Aadhaar card</option>
   <option value="voter_id_card" @if ($sellerDetail->seller_proof_of_address_type == "voter_id_card") {{ 'selected' }} @endif>Voter id</option>
   <option value="passport" @if ($sellerDetail->seller_proof_of_address_type == "passport") {{ 'selected' }} @endif>Passport</option>
   <option value="driving_license" @if ($sellerDetail->seller_proof_of_address_type == "driving_license") {{ 'selected' }} @endif>Driving licence</option>
 </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="col">
                           <label for="inputEmail4" class="add-proof"  id="aadhar_card">Aadhaar card<span class="required">*</span>
                           </label>
                           <label for="inputEmail4" class="add-proof" id="voter_id_card">Voter id
                           </label>
                           <label for="inputEmail4" class="add-proof" id="passport">Passport<span class="required">*</span>
                           </label>
                           <label for="inputEmail4" class="add-proof" id="driving_license">Driving licence<span class="required">*</span>
                           </label>
                        </div>
                        
                     </div>
                     <div class="col-md-12"><div class="col-md-12 mt-3 mb-2 font-weight-bold" style="color:#737373;font-size:14px;">Seller Address Details:</div></div>
                        <div class="col-md-12">
                        <div class="col">
                           <label>Address<span class="required">*</span></label>
                        </div>
                        <div class="col-md-12">
                           <textarea name="residental_address" disabled id="seller_address" cols="30" class="form-control">
                              {{ $sellerDetail->seller_residental_address }}
                           </textarea>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="col">
                           <label>Seller Residental City<span class="required">*</span></label>
                        </div>
                        <div class="col-md-12">
                           <input type="text" class="form-control mb-3" disabled placeholder="" name="residental_city" value="{{ $sellerDetail->seller_residental_city }}" >
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="col">
                           <label>Seller Residental State<span class="required">*</span></label>
                        </div>
                        <div class="col-md-12">
                           <input type="text" class="form-control mb-3" disabled placeholder="" name="residental_state" value="{{ $sellerDetail->seller_residental_state }}" >
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="col">
                           <label>Seller Residental Pincode<span class="required">*</span></label>
                        </div>
                        <div class="col-md-12">
                           <input type="text" class="form-control mb-3" disabled placeholder="" name="residental_pincode" value="{{ $sellerDetail->seller_residental_pincode }}" >
                        </div>
                     </div>

                    <div class="col-md-12"><div class="mt-3 mb-2 font-weight-bold" style="color:#737373;font-size:14px;">Photo Proof:</div></div>
                     <div class="row mt-3 col-md-12">
                        <div class="col-md-6">
                           <div class="col">
                              <label>Residental Proof<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                               <img  style="background-image:url('{{ asset($sellerDetail->seller_proof_of_address) }}');" alt="" class="ex-img">
                              <input type="file" name="residental_address_proof_file" disabled id="file-311132" class="form-control mt-1" accept="image/*">
                           </div>
                           
                        </div>
                         <div class="col-md-6">
                           <div class="col">
                              <label>Signature upload<span class="required">*</span></label>
                           </div>
                           <div class="col-md-12">
                               <img  style="background-image:url('{{ asset($sellerDetail->signature_upload) }}')" alt="" class="ex-img">
                              <input type="file" name="signature_upload" id="file-322" disabled class="form-control mt-1" accept="image/*">
                           </div>
                        </div>
                        
                     </div>
                     
                     <div class="col-md-12 text-center">
                        {{-- <a href="#" class="btn btn-styled btn-base-1 mt-3">Edit</a> --}}
                        <a
                        href="javascript:void(0)" 
                            class="btn btn-styled btn-base-1 mt-3"
                            onclick="sellerDetailsEnables()"
                            >Edit</a
                          >
                        <a
                              href="javascript:void(0)"
                              onclick="document.getElementById('seller-details').submit()"
                                  class="btn btn-styled btn-base-1 mt-3"
                                  >Update</a
                                >
                     </div>
                  </div>
                  </form>
               </div>
            </div>
            {{-- 
            <div class="card no-border mt-5">
               <div class="card-header py-3">
                  <h4 class="mb-0 h6 font-weight-bold">Store Details</h4>
                  <span>
                  Your store details will be displayed to the buyers when they browse your products:</span>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-8">
                        <div>
                           <div class="col">
                              <label>Your display name</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" placeholder="" value="" >
                           </div>
                        </div>
                        <div>
                           <div class="col">
                              <label>Your store description</label>
                           </div>
                           <div class="col-md-10 mb-3">
                              <textarea name="" class="form-control mb-3" id="" cols="30" rows="10"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 text-center">
                        <a href="#" class="btn btn-styled btn-base-1 mt-3">Edit</a>
                        <a href="#" class="btn btn-styled btn-base-1 mt-3">Save</a>
                     </div>
                  </div>
               </div>
            </div>
            --}}
            <div class="card no-border mt-5">
               <div class="card-header py-3">
                  <h4 class="mb-0 h6 font-weight-bold">Bank Details</h4>
                  <span>This is where we will make your payments :</span>
               </div>
               <div class="card-body">
               <form method="POST" id="payment" action="{{ route('seller-payment-details') }}" enctype="multipart/form-data">
               @csrf
                  <div class="row">
                  <input type="hidden" class="form-control mb-3" name="update"  value="true" >
                     <div class="col-md-8">
                        <div>
                           <div class="col">
                              <label>Account holder's name</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" disabled name="bank_acc_name" placeholder="" value="{{ $seller->bank_acc_name }}" >
                           </div>
                        </div>
                        <div>
                           <div class="col">
                              <label>Bank account number</label>
                           </div>
                           <div class="col-md-10 mb-3">
                              <input type="text" class="form-control" disabled name="bank_acc_no" placeholder="" value="{{ $seller->bank_acc_no }}" >
                              <span class="text-secondary">Please make sure the bank account is in the same name as the GSTIN</span>
                           </div>
                        </div>
                        <div>
                           <div class="col">
                              <label>IFSC number</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" disabled name="ifsc_code" placeholder="" value="{{ $seller->ifsc_code }}" >
                           </div>
                        </div>
                        <div>
                           <div class="col">
                              <label>Bank Name</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" disabled name="bank_name" placeholder="" value="{{ $seller->bank_name }}">
                           </div>
                        </div>
                        <div>
                           <div class="col">
                              <label>Paypal Email</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" disabled name="paypal_email" placeholder="" value="{{ $seller->paypal_email }}">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row mt-3 col-md-12">
                     <div class="col-md-6 border-right">
                        <div class="col">
                           <label>Cancelled cheque<span class="required">*</span></label>
                        </div>
                        <div class="col-md-10"> 
                           <input type="file" name="cheque" id="file-3111" disabled class="form-control" accept="image/*">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="">
                           <div class="">Cancelled cheque:</div>
                           <div class="">
                              <img  style="background-image:url('{{ asset($seller->cheque) }}')" alt="" class="ex-img">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 text-center">
                        <a
                        href="javascript:void(0)"
                        onclick="paymentEnables()"
                        class="btn btn-styled btn-base-1 mt-3"
                        >Edit</a
                      >
                        <a
                                  href="javascript:void(0)"
                                  onclick="document.getElementById('payment').submit()"
                                  class="btn btn-styled btn-base-1 mt-3"
                                  >Update</a
                                >
                        {{-- <a href="#" class="btn btn-styled btn-base-1 mt-3">Save</a> --}}
                     </div>
                  </div>
               </form>
               </div>
            </div>
            {{-- 
            <div class="card no-border mt-5">
               <div class="card-header py-3">
                  <h4 class="mb-0 h6 font-weight-bold">Address</h4>
               </div>
               <div class="card-body">
                  <div class="row mt-3">
                     <div class="col-md-6 border-right">
                        <div class="col">
                           <label>Residential address photo proof</label>
                        </div>
                        <div class="col-md-10">
                           <input type="file" name="photo"  data-multiple-caption="{count} files selected" accept="image/*">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="">
                           <div class="">Example:</div>
                           <div class="">
                              <img src="https://img1a.flixcart.com/fk-sp-static/images/Sample_AddressProof.png" alt="" class="ex-img">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 text-center">
                        <a href="#" class="btn btn-styled btn-base-1 mt-3">Save</a>
                     </div>
                  </div>
               </div>
            </div>
            --}}
            {{-- 
            <div class="card no-border mt-5">
               <div class="card-header py-3">
                  <h4 class="mb-0 h6 font-weight-bold">Pan</h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div>
                           <div class="col">
                              <label>Business name</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" placeholder="" value="" >
                           </div>
                        </div>
                        <div>
                           <div class="col">
                              <label>Pan number</label>
                           </div>
                           <div class="col-md-10 mb-3">
                              <input type="text" class="form-control" placeholder="" value="" >
                              <span class="text-secondary">Please make sure the bank account is in the same name as the GSTIN</span>
                           </div>
                        </div>
                        <div>
                           <div class="col">
                              <label>Choose Business Type</label>
                           </div>
                           <div class="col-md-10">
                              <select class="form-control mb-3"  >
                                 <option value="">Proprietor</option>
                                 <option value="">Company</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <h6>Your business address</h6>
                        <div>
                           <div class="col">
                              <label>Room/Floor/Building</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" placeholder="" value="" >
                           </div>
                        </div>
                        <div>
                           <div class="col">
                              <label>Street/Locality/Landmark</label>
                           </div>
                           <div class="col-md-10 ">
                              <input type="text" class="form-control mb-3" placeholder="" value="" >
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-5">
                              <div class="col">
                                 <label>Pincode</label>
                              </div>
                              <div class="col-12 pr-0">
                                 <input type="text" class="form-control mb-3" placeholder="" value="">
                              </div>
                           </div>
                           <div class="col-md-5 pl-0">
                              <div class="col">
                                 <label>City</label>
                              </div>
                              <div class="col-12">
                                 <input type="text" class="form-control mb-3" placeholder="" value="" >
                              </div>
                           </div>
                        </div>
                        <div>
                           <div class="col">
                              <label>State</label>
                           </div>
                           <div class="col-md-10">
                              <input type="text" class="form-control mb-3" placeholder="" value="" >
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 text-center">
                        <a href="#" class="btn btn-styled btn-base-1 mt-3">Edit</a>
                        <a href="#" class="btn btn-styled btn-base-1 mt-3">Save</a>
                     </div>
                  </div>
               </div>
            </div>
            --}}
            {{-- 
            <div class="card no-border mt-5">
               <div class="card-header py-3">
                  <h4 class="mb-0 h6 font-weight-bold">Signature</h4>
               </div>
               <div class="card-body">
                  <div class="row mt-3">
                     <div class="col-md-6 border-right">
                        <div class="col">
                           <label for="">Signature</label>
                        </div>
                        <div class="col-md-10">
                           <input type="file" name="photo" data-multiple-caption="{count} files selected" accept="image/*">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="">
                           <div class="">Example:</div>
                           <div class="">
                              <img  style="background-image:url('{{ asset($seller->signature_upload) }}')" alt="" class="ex-img">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 text-center">
                        <a href="#" class="btn btn-styled btn-base-1 mt-3">Save</a>
                     </div>
                  </div>
               </div>
            </div>
            --}}
            {{-- 
            <div class="card no-border mt-5">
               <div class="card-header py-3">
                  <h4 class="mb-0 h6 font-weight-bold">Cancelled cheque</h4>
               </div>
               <div class="card-body">
                  <div class="row mt-3">
                     <div class="col-md-6 border-right">
                        <div class="col">
                           <label>Cancelled cheque</label>
                        </div>
                        <div class="col-md-10">
                           <input type="file" name="photo" data-multiple-caption="{count} files selected" accept="image/*">
                        </div>
                     </div>
                     <div class="col-md-12 text-center">
                        <a href="#" class="btn btn-styled btn-base-1 mt-3">Save</a>
                     </div>
                  </div>
               </div>
            </div>
            --}}
         </div>
      </div>
   </div>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
   $(document).ready(()=>{
    $('#address-proof').change(()=>{
      var myID = $('#address-proof').val();
       $('.add-proof').each(function(){
           myID === $(this).attr('id') ? $(this).show() : $(this).hide();
       });
   
      });
      $(".custom-file-input").on("change", function() {
     var fileName = $(this).val().split("\\").pop();
     $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   });
    });

    function storeDetailsEnables(){
       $('#store-details .form-control').removeAttr('disabled');
      //  $('#store-details select').removeAttr('disabled');
      //  $('#store-details textarea').removeAttr('disabled');
    }
    
    function sellerDetailsEnables(){
       $('#seller-details .form-control').removeAttr('disabled');
      //  $('#seller-details select').removeAttr('disabled');
      //  $('#seller-details textarea').removeAttr('disabled');
    }
     
     function paymentEnables(){
       $('#payment .form-control').removeAttr('disabled');
      //  $('#payment select').removeAttr('disabled');
      //  $('#payment textarea').removeAttr('disabled');
    }
</script>
@endsection