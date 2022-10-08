<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
      <link href="https://fonts.googleapis.com/css?family=Open Sans" rel="stylesheet" />
      <style>
         body {
         background: #f1f1f1;
         font-size: 14px;
         font-family: "Open Sans";
         color: #666;
         }
         .main-card {
         margin: 75px auto;
         padding: 15px;
         max-width: 850px;
         border: none;
         }
         @media screen and (max-width:767px){
         .main-card{
         padding: 0!important;
         }
         .wc-setup-content{
         padding: 0!important;
         }
         .wc-setup-actions .button{
         min-width: 100%;
         width: 100%;
         padding: 12px 6px;
         }
         }
         h1#wc-logo {
         font-size: 2em;
         line-height: 1;
         text-align: center;
         border-bottom: 1px solid #ddd;
         clear: both;
         color: #666;
         font-size: 24px;
         padding: 0;
         padding-bottom: 7px;
         margin-bottom: 0.5em;
         }
         #wc-logo a {
         color: #17a2b8;
         text-decoration: none;
         }
         #wc-logo a span {
         padding-left: 10px;
         padding-top: 23px;
         display: inline-block;
         vertical-align: top;
         font-weight: 500;
         }
         .wc-setup-steps {
         padding: 0 0 24px;
         margin: 0;
         list-style: none outside;
         overflow: hidden;
         color: #ccc;
         width: 100%;
         display: -webkit-inline-box;
         display: inline-flex;
         }
         .wc-setup-steps li {
         width: 100%;
         float: left;
         padding: 0 0 0.8em;
         margin: 0;
         text-align: center;
         position: relative;
         border-bottom: 4px solid #ccc;
         line-height: 1.4;
         }
         .wc-setup-steps li::before {
         content: "";
         border: 4px solid #ccc;
         border-radius: 100%;
         width: 4px;
         height: 4px;
         position: absolute;
         bottom: 0;
         left: 50%;
         margin-left: -6px;
         margin-bottom: -8px;
         background: #fff;
         }
         .wc-setup-content {
         box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);
         padding: 2em;
         margin: 0 0 20px;
         background: #fff;
         overflow: hidden;
         zoom: 1;
         text-align: left;
         }
         .wc-setup-content h1 {
         margin: 0 0 20px;
         border: 0;
         padding: 0;
         color: #666;
         clear: none;
         font-weight: 500;
         }
         .wc-setup-content p {
         margin: 20px 0;
         font-size: 1em;
         line-height: 1.75;
         color: #666;
         }
         .step {
         text-align: center;
         }
         .wc-setup-actions .wcfm_submit_button {
         color: #b0bec5;
         }
         .wc-setup-actions .wcfm_submit_button {
         border-color: #1c2b36;
         }
         .wc-setup-actions .wcfm_submit_button {
         background: #1c2b36;
         }
         .wc-setup-actions .button-primary {
         box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25), 0 1px 0 #17a2b8;
         text-shadow: 0 -1px 1px #a36597, 1px 0 1px #a36597, 0 1px 1px #17a2b8,
         -1px 0 1px #17a2b8;
         }
         .wc-setup-actions .button {
         font-weight: 300;
         font-size: 16px;
         padding: 12px 32px;
         box-shadow: none;
         min-width: 17em;
         margin-top: 10px;
         line-height: 1;
         margin-right: 0.5em;
         margin-bottom: 2px;
         height: auto;
         border-radius: 4px;
         }
         .button {
         color: #0071a1;
         border: 1px solid #0071a1;
         background: #f3f5f6;
         vertical-align: top;
         }
         .wc-setup-content p {
         margin: 20px 0;
         font-size: 1em;
         line-height: 1.75;
         color: #666;
         }
         /* .button.button-large {
         min-height: 32px;
         line-height: 2.30769231;
         padding: 0 12px;
         } */
         /* Active Class Start */
         .wc-setup-steps li.active {
         border-color: #17a2b8;
         color: #17a2b8;
         }
         .wc-setup-steps li.active:before {
         background-color: #17a2b8;
         }
         .wc-setup-steps li.active::before {
         border-color: #17a2b8;
         }
         /* Active Class End  */
         .form-check {
         margin: 10px;
         }
         .required {
         color: red;
         }
         .add-proof {display: none;}
         #electricity, #company
         {display: block;
         }
         .store-type {display: none;}
         .invalid-feedback{
  display:block;
}
      </style>
   </head>
   <body>
      <div class="container">
         <div class="card main-card">
            <div class="card-body">
               <h1 id="wc-logo">
                  <a target="_blank" href="https://shopspot.in"><img width="75" height="75"
                     src="https://shopspot.in/wp-content/plugins/wc-frontend-manager/assets/images/wcfmmp-blue.png"
                     alt="Shopspot" /><span>Store Setup</span></a>
               </h1>
               <ol class="wc-setup-steps">
                  <li class="active">Product</li>
                  <li class="active">Courier pickup</li>
                  <li class="active">Seller</li>
                  <li >Store</li>
                  <li>Payment</li>
                  {{-- 
                  <li>Policies</li>
                  <li>Customer Support</li>
                  <li>SEO</li>
                  <li>Social</li>
                  --}}
                  <li>Ready!</li>
               </ol>
               <div class="wc-setup-content">
                  <div class="container">
                     <h3>Store details</h3>
                     <form id="store-details" method="POST" action="{{ route('seller-store-details') }}" enctype="multipart/form-data">
                     @csrf
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Store type<span class="required">*</span></label>
                              <select class="form-control" name="store_type">
                                 <option value="company">Company</option>
                                 <option value="proprietor">Proprietor</option>
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Store name<span class="required">*</span></label>
                              <input name="store_name" type="text" class="form-control">
                              @if ($errors->has('store_name'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('store_name') }}</strong>
                           </span>
                           @endif
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Store mobile number<span class="required">*</span>
                              </label>
                              <input type="text" class="form-control " placeholder="{{__('Your Mobile')}}" name="mobile" value="{{ Auth::user()->phone }}" disabled>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="storeEmail">Store email<span class="required">*</span>
                              </label>
                              <input type="email" class="form-control " placeholder="{{__('Your Email')}}" name="email" value="{{ Auth::user()->email }}" disabled>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Store logo<span class="required">*</span></label>
                             
                              <div class="input-group">
                                 <div class="custom-file">
                                
                                    <input  name="store_logo" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                 </div>
                              </div>
                              @if ($errors->has('store_logo'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('store_logo') }}</strong>
                           </span>
                           @endif
                           </div>

                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Pan Card number<span class="required">*</span></label>
                              <input type="text" class="form-control"  name="pan_card_number" placeholder="{{__('Your Pan Card number')}}" name="" >
                             
                           </div>

                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Pan Card<span class="required">*</span></label>
                             
                              <div class="input-group">
                                 <div class="custom-file">
                                
                                    <input  name="pan_card" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                 </div>
                              </div>
                              @if ($errors->has('pan_card'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('pan_card') }}</strong>
                           </span>
                           @endif
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Store GSTIN number</label>
                              <input  name="store_gst" type="number" max="15" class="form-control">
                              @if ($errors->has('store_gst'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('store_gst') }}</strong>
                           </span>
                           @endif
                           </div>
                           <div class="form-group col-md-6">
                              <label for="tanNumber">Store TAN number<span ></span></label>
                              <input  name="store_tan"  type="number" max="10" class="form-control" id="tanNumber">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="storeAddress">Store address<span class="required">*</span></label>
                              <textarea  class="form-control" name="store_address" id="storeAddress"></textarea>
                              @if ($errors->has('store_address'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('store_address') }}</strong>
                           </span>
                           @endif
                           </div>


                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Store address city<span class="required">*</span></label>
                              <input  name="store_address_city" type="text" class="form-control">
                              @if ($errors->has('store_address_city'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('store_address_city') }}</strong>
                           </span>
                           @endif
                           </div>
                           <div class="form-group col-md-6">
                           <label for="inputEmail4">Store address state<span class="required">*</span></label>
                              <input  name="store_address_state" type="text" class="form-control">
                              @if ($errors->has('store_address_state'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('store_address_state') }}</strong>
                           </span>
                           @endif
                           </div>
                           <div class="form-group col-md-6">
                           <label for="inputEmail4">Store address pincode<span class="required">*</span></label>
                              <input  name="store_address_pincode" type="text"  class="form-control">
                              @if ($errors->has('store_address_pincode'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('store_address_pincode') }}</strong>
                           </span>
                           @endif
                           </div>


                           <div class="form-group col-md-6">
                              <label for="pick_up_address">Pick up address<span class="required">*</span></label>
                              <textarea  class="form-control" name="pick_up_address" id="pick_up_address"></textarea>
                              @if ($errors->has('pick_up_address'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('pick_up_address') }}</strong>
                           </span>
                           @endif
                           </div>

                           
                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Pickup address city<span class="required">*</span></label>
                              <input  name="pick_up_address_city" type="text" class="form-control">
                              @if ($errors->has('pick_up_address_city'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('pick_up_address_city') }}</strong>
                           </span>
                           @endif
                           </div>
                           <div class="form-group col-md-6">
                           <label for="inputEmail4">Pickup address state<span class="required">*</span></label>
                              <input  name="pick_up_address_state" type="text" class="form-control">
                              @if ($errors->has('pick_up_address_state'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('pick_up_address_state') }}</strong>
                           </span>
                           @endif
                           </div>
                           <div class="form-group col-md-6">
                           <label for="inputEmail4">Pickup address pincode<span class="required">*</span></label>
                              <input  name="pick_up_address_pincode" type="text"  class="form-control">
                              @if ($errors->has('pick_up_address_pincode'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('pick_up_address_pincode') }}</strong>
                           </span>
                           @endif
                           </div>


                           <div class="form-group col-md-6">
                              <label for="input">Store address photo proof <span class="required">*</span></label>
                              <select class="form-control" id="address-proof" name="store_address_proof_type">
                                 <option value="electricity_bill">Electricity bill</option>
                                 <option value="telephone_bill">Telephone bill</option>
                                 <option value="bank_passbook">Bank passbook</option>
                              </select>
                           </div>
                           <div class="form-group col-md-6" >
                           
                              <label for="inputEmail4" class="add-proof" id="electricity">Electricity bill <span class="required">*</span>
                              </label>
                              <label class="add-proof"  id="passbook" for="inputEmail4">Bank passbook <span class="required">*</span>
                              </label>
                              <label for="inputEmail4" class="add-proof" id="telephone" >Telephone bill <span class="required">*</span>
                              </label>
                              <div class="input-group" title="Preferred size is (125x125) pixels.">
                                 <div class="custom-file">
                                    <input name="store_address_proof" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                 </div>
                                 @if ($errors->has('store_address_proof'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('store_address_proof') }}</strong>
                           </span>
                           @endif
                              </div>
                           </div>
                          
                           
                             
                           </div>
                       
                           
                              
                       
                           <!-- <div class="form-group col-md-6">
                              <label for="inputEmail4">Store address photo proof <span class="required">*</span></label>
                              <div class="input-group">
                                 <div class="custom-file">
                                    <input  name="store_name" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                 </div>
                              </div>
                           </div> -->
                           <div class="col-md-12">
                              <p class="wc-setup-actions step mt-5 mx-auto">
                                 <a
                                    href="javascript:void(0)"
                                    onclick="document.getElementById('store-details').submit()"
                                    class="button-primary button button-large button-next wcfm_submit_button"
                                    >Continue</a
                                    >
                                    <a
                          href="{{url('/store/setup/payment')}}"
                          class="button button-large"
                          >Skip this step</a
                        >
                              </p>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- Seller verification End  -->
         </div>
      </div>
      </div>
      </div>
     <!-- JS, Popper.js, and jQuery -->
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
            $('#store-type').change(()=>{
            var myID = $('#store-type').val();
             $('.store-type').each(function(){
                 myID === $(this).attr('id') ? $(this).show() : $(this).hide();
             });
         
            });
            $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
          });
          
           
      </script>
   </body>
</html>