<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Seller Registration</title>
      <!-- CSS only -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
         integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
         integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
         <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
         <meta name="csrf-token" content="{{ csrf_token() }}">
      <style>
        body{
         overflow-x: hidden;
         font-family: 'Open Sans';
         }
         .navbar-brand {
         margin: 10px 0px;
         }
         /* .navbar-brand img{
         width: 25%;
         } */
         .btn-custom-dark {
         background-color: #333;
         color: #fff;
         border-radius: 4px;
         padding: 10px 10px;
         font-size: 14px;
         width: 100%;
         }
         input.form-control {
         height: 43px
         }
         .navbar-nav {
         padding-top: 8px;
         }
         .width40 {
         width: 40%;
         }
         .width20 {
         width: 20%;
         }
         .bg-main {
         background: #027cd5;
         }
         .navbar-light .navbar-nav .active>.nav-link {
         color: #fff;
         font-size: 15px;
         }
         .navbar-light .navbar-nav .nav-link {
         color: #fff;
         }
         .blue-header {
         height: 43px;
         }
         @media screen and (max-width:991px){
         .blue-header{
         display: none;
         }
         }
         .navbar-light .navbar-nav .nav-link:focus,
         .navbar-light .navbar-nav .nav-link:hover {
         color: #fff;
         }
         .content-area {
         background: url('public/img/seller-img/SELLER-BANNER.png') 100% 100%;
         background-size: 100% 100%;
         background-position: center;
         background-repeat: no-repeat;
         height: 550px;
         }
         @media screen and (max-width:767px){
         .content-area{
         background: #00a8ec;
         }
         }
         .seller-reg {
         background: #ffffffbd;
         width: 65%;
         padding: 33px 16px 15px 16px;
         margin: 97px;
         border-radius: 20px;
         }
      
         .entry-content{
         background: url('public/img/seller-img/banner-2.png');
         background-size: 100% 100%;
         background-position: center;
         background-repeat: no-repeat;
         height: 550px;
         }
         .wpb_wrapper{
         background: url('public/img/seller-img/banner-3.png');
         background-size: 100% 100%;
         background-position: center;
         background-repeat: no-repeat;
         height: 550px;
         }
     
         .fixed-top.main-nav {
         transition:all 300ms;
         }
         .cancel-btn{
         font-size: .875rem;
         border-radius: 1.571em;
         padding: 1.036em 2.134em;
         border-width: 0;
         display: inline-block;
         color: #333e48;
         background-color: #efecec;
         border-color: #efecec;
         transition: all .2s ease-in-out;
         }
         .btn:hover{
         color: #fff!important;
         }
      </style>
   </head>
   <body>
  @include('seller_registration.header')
      <!-- Content area start  -->
      <div class="content-area">
         <div class="row">
            <div class="col-md-6"></div>
            <div class="col-12 col-md-6">
               <form class="form-default"  role="form" id="signUpForm" >
                  @csrf
                  <div class="seller-reg">
                     <h3 class="text-center font-weight-normal mb-2">Start Selling</h3>
                     <div class="form-group">
                        <div class="input-group mb-2" >
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">@</span>
                           </div>
                           <input type="email" class="form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  placeholder="Email" aria-label="Email"
                              aria-describedby="basic-addon1" name="email">
                           <span id="emailExists" class="invalid-feedback" role="alert">
                           Email address already exists
                           </span>
                           @if ($errors->has('email'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                           </div>
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">+91</span>
                           </div>
                           <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Please enter 10 digit phone number" aria-label="mobile"
                              aria-describedby="basic-addon1" name="phone">
                           <span id="phoneExists" class="invalid-feedback" role="alert">
                           Phone number already exists
                           </span>
                           @if ($errors->has('phone'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('phone') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                           </div>
                           <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" aria-label="Password"
                              aria-describedby="basic-addon1" name="password">
                           
                           @if ($errors->has('password'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                           </div>
                           <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Password"
                              aria-describedby="basic-addon1" name="password_confirmation">
                        </div>
                     </div>
                     <div class="row">
                        <button type="submit" class="btn btn-custom-dark mt-2 mx-auto w-auto">SIGN UP</button>
                     </div>
                  </div>
               </form>
               <form class="form-default d-none" role="form" id="otpForm" action="{{ route('otpVerification') }}" method="POST">
                 @csrf 
                 <input hidden name="phone" value="" id="phones">
                  <div class="seller-reg">
                     <div class="form-group">
                        <p>Please enter OTP sent to your mobile number.
                        </p>
                        <div class="input-group mb-2" >
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                           </div>
                           <input type="text" class="form-control form-control{{ $errors->has('verification_code') ? ' is-invalid' : '' }}"  placeholder="Enter OTP" aria-label="otp"
                              aria-describedby="basic-addon1" name="verification_code">
                          @if ($errors->has('verification_code'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('verification_code') }}</strong>
                           </span>
                           @endif 
                        </div>
                     </div>
                     
                     <div>
                        <button type="submit" class="btn btn-block btn-custom-dark mt-2">VERIFY</button>
                        <!-- <button type="button" class="btn btn-block btn-custom-dark" style="margin-top: 30px;">SEND AGAIN</button> -->
                     </div>
                  </div>
               </form>
          
            </div>
         </div>
      </div>
      <!-- Content area End  -->
      <!-- entry content start  -->
      <div class="entry-content">
      </div>
      <!-- entry content end  -->
      <!-- wpb_wrapper content start  -->
      <div class="wpb_wrapper">
      </div>
      <!-- wpb_wrapper content end  -->
      <!-- slide-line start  -->
      <div class="slide-line">
         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="public/img/seller-img/1.png" class="d-block w-100" alt="img">
               </div>
               <div class="carousel-item">
                  <img src="public/img/seller-img/2.png" class="d-block w-100" alt="img">
               </div>
               <div class="carousel-item">
                  <img src="public/img/seller-img/3.png" class="d-block w-100" alt="img">
               </div>
               <div class="carousel-item">
                  <img src="public/img/seller-img/4.png" class="d-block w-100" alt="img">
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </div>
      <!-- slide-line end -->


   {{-- Footer start  --}}

   @include('seller_registration.footer')
   {{-- Footer END  --}}

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- JS, Popper.js, and jQuery -->
      <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
         integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
         integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
         integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      <script>
         // $(function () {
         // $(document).scroll(function () {
         //   var $nav = $(".main-nav");
         //   $nav.toggleClass('scrolled', $(this).scrollTop() < $nav.height());
         //   $('.main-nav').toggleClass('fixed-top shadow', $(this).scrollTop() > $nav.height());
         // });
         //  $('.forgot').click(()=>{
         //            console.log('enter');
         //              if($('#forget-password').hasClass('d-none')){
         //                  $('#forget-password').removeClass('d-none');
         //                 $('#login-form').addClass('d-none');
         
         //              }
         //              else if($('#login-form').hasClass('d-none')){
         //                 $('#login-form').removeClass('d-none');
         //                 $('#forget-password').addClass('d-none');
         
         //              }
         //         });
         
         
         // });

       
         $(function () {
        $('#signUpForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ route('sellerRegistration')}}',
                data: $('#signUpForm').serialize(),

                success: function (data) {
                  // console.log(data);
                 if(data.error)
                 {
                   if(data.error == 'Email address already exists'){
                     $('#emailExists').css('display','block');
                     console.log(data.error);
                   }
                   else if(data.error == 'Phone number already exists'){
                     $('#phoneExists').css('display','block');
                     console.log(data.error);
                   }
                 }
                 else{
                  $('#signUpForm').hide();
                   $('#otpForm').removeClass('d-none');
                   $('#phones').val(data.phone);
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