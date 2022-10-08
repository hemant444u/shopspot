<style>
   /* navbar Css start  */
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
   @media screen and (max-width:991px) {
   .blue-header {
   /* background: #00a8ec; */
   display: none;
   }
   }
   .navbar-light .navbar-nav .nav-link:focus,
   .navbar-light .navbar-nav .nav-link:hover {
   color: #fff;
   }
   /* Navbar Css end  */
   body {
   overflow-x: hidden;
   }
   .fixed-top.main-nav {
   /* background-color: #fff !important; */
   transition: all 300ms;
   }
   .pb40 {
   padding-bottom: 40px;
   }
   span {
   font-weight: 400;
   }
   strong {
   font-size: 14px;
   color: rgb(51, 62, 72);
   }
   .accordion .card {
   border: none;
   }
   .accordion .card .card-header {
   border: none;
   background-color: white;
   }
   .card-header button {
   color: #333e48;
   font-size: 18px;
   text-align: left;
   }
   .panel-title>a:before {
   text-align: center;
   float: left !important;
   content: "-";
   color: #b5b5b5;
   /* background-color: white; */
   border: 1px solid #027cd5;
   width: 34px;
   padding: 3px;
   font-weight: 600;
   border-radius: 5px;
   height: 30px;
   background-color: #027cd5;
   }
   .panel-title>a.collapsed:before {
   text-align: center;
   float: left !important;
   content: "+";
   color: #b5b5b5;
   background-color: white;
   border: 1px solid #b5b5b5;
   width: 34px;
   padding: 3px;
   font-weight: 600;
   border-radius: 5px;
   height: 30px;
   }
   .panel-title>a:hover,
   .panel-title>a:active,
   .panel-title>a:focus {
   text-decoration: none;
   }
   .panel-title,
   .panel-body {
   margin-bottom: 1.5rem;
   }
   a[data-toggle='collapse'] {
   padding-left: 46px;
   color: #666;
   font-size: 18px;
   font-weight: 400;
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
<!-- Header Start  -->
<nav class="navbar navbar-expand-lg navbar-light bg-white main-nav">
   <div class="container">
      <div class="row">
         <div class="col-sm-3">
            <a class="navbar-brand" href="#">
            <img src="public/img/seller-img/Seller-Portal-Logo.png" class="img-fluid">
            </a>
         </div>
         <div class="col-sm-9">
            <div class="navbar-nav">
               <form class="w-100 form-default" id="login-form"  role="form">
                  <div class="form-row align-items-center">
                     <div class="col-auto width40">
                        <label class="sr-only" for="inlineFormInputGroup">Username/Email</label>
                        <div class="form-group">
                           <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <div class="input-group-text"><i class="fa fa-user"></i></div>
                              </div>
                              <input type="text" class="form-control form-control-sm {{ $errors->has('emailAddress') ? ' is-invalid' : '' }}" value="{{ old('emailAddress') }}" placeholder="{{__('Email Or Phone')}}" name="emailAddress" id="email">
                           </div>
                        </div>
                        <span id="unauthorized" class="invalid-feedback" role="alert">
                           Invalid email or password
                           </span>
                     </div>
                     <div class="col-auto width40">
                        <label class="sr-only" for="inlineFormInputGroup">Password</label>
                        <div class="form-group">
                           <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <div class="input-group-text"><i class="fa fa-key"></i></div>
                              </div>
                              <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{__('Password')}}" name="password" id="password">
                           </div>
                        </div>
                     </div>
                     <div class="col-auto width20">
                        <button type="submit" class="btn btn-custom-dark mb-2">SIGN IN</button>
                     </div>
                  </div>
                  <div class="form-row">
                     <!-- <div class="col-auto"> -->
                     <!-- <div class="form-group">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="remember_me" id="autoSizingCheck">
                            <label class="form-check-label" for="autoSizingCheck">
                                Remember me
                            </label>
                        </div>
                        </div>
                        </div> -->
                     <div class="col-auto">
                        <a href="javascript:void(0)" class="forgot">Forgot Password?</a>
                     </div>
                  </div>
               </form>
               <form id="forget-password" class="w-100 d-none" role="form">
                  <span style="font-size: 14px;color: rgb(51, 62, 72);;">Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.
                  </span>
                  <div class="form-row align-items-center">
                     <div class="col-auto w-50">
                        <label class="sr-only" for="inlineFormInputGroup">Email</label>
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fa fa-user"></i></div>
                           </div>
                           <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="forgetEmail" value="{{ old('email') }}" required id="inlineFormInputGroup"
                              placeholder="Email">
                           @if ($errors->has('email'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                           @endif
                           <span id="forgetEmailSent" class="invalid-feedback" role="alert">
                           Email address doesnot exist
                           </span>
                           <span id="emailSent" class="invalid-feedback" role="alert">
                           Reset password email sent successfully
                           </span>
                           
                        </div>
                     </div>
                     <div class="col-auto width20">
                        <button type="submit" class="btn btn-custom-dark mb-2">EMAIL RESET LINK</button>
                     </div>
                     <div class="col-auto width20">
                        <button type="button" class="btn cancel-btn mb-2  forgot" >Cancel</button>
                     </div>
                  </div>
               </form>
            </div>
            <form class="form-default w-100 d-none" id="otpFormLogin" role ="form" action="{{ route('otpVerification') }}" method="POST">
               @csrf
               <span style="font-size: 14px;color: rgb(51, 62, 72);;">Please enter OTP sent to your mobile number.
               </span>
               <div class="form-row align-items-center">
                  <input hidden name="phone" value="" id="phone">
                  <div class="col-auto w-50">
                     <label class="sr-only" for="inlineFormInputGroup">OTP</label>
                     <div class="input-group mb-2">
                        <div class="input-group-prepend">
                           <div class="input-group-text"><i class="fa fa-key"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup"
                           placeholder="OTP" name="verification_code">
                        @if ($errors->has('verification_code'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('verification_code') }}</strong>
                        </span>
                        @endif 
                     </div>
                  </div>
                  <div class="col-auto width20">
                     <button type="submit" class="btn btn-custom-dark mb-2">VERIFY</button>
                  </div>
                  <div class="col-auto width20">
                     <button type="button" class="btn cancel-btn mb-2  forgot" >Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</nav>
<!-- Header End  -->
<!-- blue header start  -->
<nav class="navbar navbar-expand-lg navbar-light bg-main blue-header">
   <div class="container">
      <div>
         <ul class="navbar-nav p-0">
            <li class="nav-item active">
               <a class="nav-link" href="/shopspot/seller-registrations">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">SELL SMART</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">PRICING</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/shopspot/benefits">BENEFITS</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/shopspot/seller-faq">FAQ</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">SHOPSPOT.IN</a>
            </li>
         </ul>
      </div>
   </div>
</nav>
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
   $(document).scroll(function () {
     var $nav = $(".main-nav");
     $nav.toggleClass('scrolled', $(this).scrollTop() < $nav.height());
     $('.main-nav').toggleClass('fixed-top shadow', $(this).scrollTop() > $nav.height());
   });
    $('.forgot').click(()=>{
              console.log('enter');
                if($('#forget-password').hasClass('d-none')){
                  console.log('enter');
                    $('#forget-password').removeClass('d-none');
                   $('#login-form').addClass('d-none');
   
                }
                else if($('#login-form').hasClass('d-none')){
                   $('#login-form').removeClass('d-none');
                   $('#forget-password').addClass('d-none');
   
                }
           });
   
   
   });
   
   
   $(function () {
   $('#login-form').on('submit', function (e) {
      e.preventDefault();
      $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   });
                    var formData = {
                      emailAddress : $('#email').val(),
                      password: $('input[name="password"]').val(),
                    };
      $.ajax({
          type: 'POST',
          url: '{{ route('sellerLogin')}}',
          // data: $('#login-form').serialize(),
          data: formData,
          
          success: function (data) {
            console.log(data);
         //   alert(data);
            if(data.user.is_verified == 0){
              $('#login-form').hide();
            $('#otpFormLogin').removeClass('d-none');
            $('#phone').val(data.user.phone);
          }
          else{
              window.location.href = "{{url('/dashboard')}}";
          }
           
          },
          error: function (error) {

             if(error.responseJSON.message == 'Unauthorized') {
               $('#unauthorized').css('display','block');
             }
              console.log(data);
             
          }
      });
   });
   
   });
   
   
   
   $(function () {
   $('#forget-password').on('submit', function (e) {
      e.preventDefault();
      $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   });
   var formData = {
                      email : $('input[name="forgetEmail"]').val(),
   }
   
      $.ajax({
          type: 'POST',
          url: '{{ route('seller.reset-email')}}',
          data: formData,
   
          success: function (data) {
              console.log(data);
              if(data.error){
               $('#forgetEmailSent').css('display','block');
             }       
             else {
                $('#emailSent').css('display','block');
             }       
                                      },
          error: function (data) {
              console.log(data);
             
          }
      });
   });
   
   });
   
   
   
    
   
</script>
<!-- blue header end  -->