
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
         integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
         integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
         <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
         <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <li>Seller</li>
                    <li>Store</li>
                    <li>Payment</li>
                    {{-- <li>Policies</li>
                    <li>Customer Support</li>
                    <li>SEO</li>
                    <li>Social</li> --}}
                    <li>Ready!</li>
                </ol>
                <div class="wc-setup-content">
                    <div class="container">
                        <h3>Courier pickup</h3>
                        <form  id="pickup-details-form"  role="form">
                      
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4"> Pin code verification
            </label>
            <input type="text" name="store_pickup_courier_pin_code" class="form-control">
        </div>
        <span id="not_available" class="invalid-feedback" role="alert">
        Courier service is not available in your area
                           </span>
    </div>
</form>
    <div class="col-md-12">
    <p class="wc-setup-actions step mt-5 mx-auto">
                                <a
                              href="javascript:void(0)"
                              id="textSubmit"
                                  class="button-primary button button-large button-next wcfm_submit_button"
                                  >Continue</a
                                >
                    
                                <a
                                  href="{{url('store/setup/seller-details')}}"
                                  class="button button-large"
                                  >Skip this step</a
                                >
                              </p> 
      </div>
    </div>
    </div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- JS, Popper.js, and jQuery -->
      <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
         integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
         integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
         integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script>
       
         $(function () {
        $('#textSubmit').on('click', function (e) {
            e.preventDefault();
            $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }

   });
   
   var formData = {
    store_pickup_courier_pin_code : $('input[name="store_pickup_courier_pin_code"]').val(),
   };
            $.ajax({
                type: 'POST',
                url: '{{ route('store-courier-pickup')}}',
                data: formData,

                success: function (data) {
                  console.log(data);
                 if(data.error)
                 {
                   if(data.error == 'Courier service is not available in your area'){
                     $('#not_available').css('display','block');
                     console.log(data.error);
                   }
                 }
                 else{
                    window.location.href = "/shopspot/store/setup/seller-details" ;
                 }
                 
                                            },
                error: function (data) {
                    console.log(data.responseJSON.errors);
                   
                }
            });
        });
      
    });

   
          
       
      </script>




</body>

</html>