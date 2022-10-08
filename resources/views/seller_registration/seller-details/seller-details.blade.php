
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
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
#aadhar {display: block;}
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
        {{-- <li>Policies</li>
        <li>Customer Support</li>
        <li>SEO</li>
        <li>Social</li> --}}
        <li>Ready!</li>
    </ol>
                <div class="wc-setup-content">
                    <div class="container">
                        <h3>Seller details</h3>
                        <form id="seller-details" method="POST" action="{{ route('seller-details') }}"  enctype="multipart/form-data">
                        @csrf
                          <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">First name<span class="required">*</span></label>
                             <input type="text" name="first_name" class="form-control">
                             @if ($errors->has('first_name'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('first_name') }}</strong>
                           </span>
                           @endif
                        </div>
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Second name<span class="required">*</span></label>
                             <input type="text" name="second_name" class="form-control">
                             @if ($errors->has('second_name'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('second_name') }}</strong>
                           </span>
                           @endif
                        </div>                     
                              {{-- <div class="form-group col-md-6">
                                <label for="inputEmail4">Seller name</label>
                                 <input type="text" class="form-control">
                            </div> --}}
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Email id</label>
                               <input type="text" name="email" class="form-control">
                               
                          </div>
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Mobile number
                              </label>
                              <input type="text" name="mobile" class="form-control">
                              
                          </div>  
                         
                        <div class="form-group col-md-6">
                          <label for="input">Select proof of Address <span class="required">*</span>
                          </label>
                        
 <select class="form-control" id="address-proof" name="residental_address_proof_type">
   <option value="aadhar_card">Aadhaar card</option>
   <option value="voter_id_card">Voter id</option>
   <option value="passport">Passport</option>
   <option value="driving_license">Driving licence</option>
 </select>
                        </div>
                
                          
                        {{-- <div class="form-group col-md-6 add-proof" id="residential">
                          <label for="inputEmail4">Residential Address proof
                          </label>
                          <div class="input-group" title="Preferred size is (125x125) pixels.">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            
                             
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>
                      </div> --}}
                      <div class="form-group col-md-6">
                      @if ($errors->has('residental_address_proof_file'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('residental_address_proof_file') }}</strong>
                           </span>
                           @endif
                        <label for="inputEmail4" class="add-proof"  id="aadhar">Aadhaar card<span class="required">*</span>
                        </label>
                        <label for="inputEmail4" class="add-proof" id="votar">Voter id
                        </label>
                        <label for="inputEmail4" class="add-proof" id="passport">Passport<span class="required">*</span>
                        </label>
                        <label for="inputEmail4" class="add-proof" id="driving">Driving licence<span class="required">*</span>
                        </label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="residental_address_proof_file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                           
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                           
                          </div>
                        </div> 
                    </div>
                    <div class="form-group col-md-6">
                      @if ($errors->has('signature_upload'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('signature_upload') }}</strong>
                           </span>
                           @endif
                        <label for="signature_upload" class=""  id="signature">Signature Upload<span class="required">*</span>
                        </label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="signature_upload" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                           
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                           
                          </div>
                        </div> 
                    </div>
                   
      

                   
  
  
      <div class="form-group col-md-6">
        <label for="inputEmail4">Residential Address<span class="required">*</span></label>
         <textarea  class="form-control" name="residental_address">
         </textarea>
         @if ($errors->has('residental_address'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('residental_address') }}</strong>
                           </span>
                           @endif
    </div>
    <div class="form-group col-md-6">
                            <label for="inputEmail4">Seller Residental City<span class="required">*</span></label>
                             <input type="text" name="residental_city" class="form-control">
                             @if ($errors->has('residental_city'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('residental_city') }}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Seller Residental State<span class="required">*</span></label>
                             <input type="text" name="residental_state" class="form-control">
                             @if ($errors->has('residental_state'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('residental_state') }}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Seller Residental Pincode<span class="required">*</span></label>
                             <input type="text" name="residental_pincode" class="form-control">
                             @if ($errors->has('residental_pincode'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('residental_pincode') }}</strong>
                           </span>
                           @endif
                        </div>
          
  

<div class="col-md-12">
                              <p class="wc-setup-actions step mt-5 mx-auto">
                                <a
                              href="javascript:void(0)"
                              onclick="document.getElementById('seller-details').submit()"
                                  class="button-primary button button-large button-next wcfm_submit_button"
                                  >Continue</a
                                >
                    
                                <a
                          href="{{url('/store/setup/store-details')}}"
                          class="button button-large"
                          >Skip this step</a
                        >
                              </p> 
                            </div>
                          </form>
                          </div>
                        </div>
                    </div>
                </div>
             
            </div>
  
            <!-- Seller verification End  -->




        </div>
    </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
  </script>
</body>

</html>

