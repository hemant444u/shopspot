<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benefits</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

    <style>
           body{
         overflow-x: hidden;
         font-family: 'Open Sans';
         }
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
        .accordion .card{
         border: none;
        }
        .accordion .card .card-header{
            border: none;
            background-color:white;
        }
        .card-header button{
            color: #333e48;
            font-size: 18px;
            text-align: left;
        }

        .panel-title > a:before {
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
.panel-title > a.collapsed:before {
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
.panel-title > a:hover, 
.panel-title > a:active, 
.panel-title > a:focus  {
    text-decoration:none;
}
.panel-title, .panel-body{
    margin-bottom: 1.5rem;
}
a[data-toggle='collapse']{
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

    </style>

</head>

<body>

    @include('seller_registration.header')


    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-6 px-0 pb40">
                        <div class="text-center">
                            <h3><span style="color: #0865b0;">Cataloguing</span></h3>
                            <p><strong>The art of selling smart</strong></p>
                            <p class="text-left">Customers always choose to buy products that look the best and have the
                                most accurate
                                descriptions. We help you attract customers with smart cataloguing. Get attractive
                                images and clear description of your products and grab customers’ attention.</p>
                            <p><strong>We are developing catalogue partners across India who will assist you
                                    with:</strong></p>
                            <ul class="text-left">
                                <li>Quick design and development of your catalogues</li>
                                <li>Best quality images</li>
                                <li>Clear and complete description of your products</li>
                                <li>Catalogue that prompts quick buying decision</li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-sm-6 pb40">
                        <div class="text-center">
                            <h3><span style="color: #0865b0;">Easy pick-up and delivery</span></h3>
                            <p><strong>Delivering your products to 1000+ cities</strong></p>
                            <p class="text-left">Our ever-growing logistics network ensures faster delivery of your
                                products across India. Your customers get great service and you get better ratings.</p>
                            <p><strong>Our logistics network:</strong></p>
                            <ul class="text-left">
                                <li>Ensures smooth pick-up and delivery of your products</li>
                                <li>Superior experience for your customers</li>
                                <li>Effortless order fulfilment through 200+ pick-up hubs and 10,000+ delivery personnel
                                </li>
                            </ul>

                        </div>
                    </div>


                    <div class="col-sm-6 pb40">
                        <div class="text-center">
                            <h3><span style="color: #0865b0;">FASTER PAYMENTS</span></h3>
                            <p><strong>Your earnings don’t keep you waiting</strong></p>
                            <p class="text-left">Re-invest profits to generate more business without any delay. At
                                Shopspot,
                                you get your payments within 5-14 business days of dispatching an order. The payment is
                                made
                                directly to your bank account, thus making the whole process fast and easy.</p>
                            <p><strong>Easy and fast payment process. You get:</strong></p>
                            <ul class="text-left">
                                <li>Fastest payment for fulfilled orders</li>
                                <li>Quick re-investing opportunities</li>
                                <li>Detailed information on payment settlement on seller dashboard</li>
                            </ul>
                            <h1></h1>

                        </div>
                    </div>

                    <div class="col-sm-6 pb40">
                        <div class="text-center">
                            <h3 style="text-align: center;"><span style="color: #0865b0;">TRAINING</span></h3>
                            <p style="text-align: center;"><strong>Learn the art of selling online</strong></p>
                            <p style="text-align: left;">Shopspot has been driving seller training on key pain areas for
                                the last 6 months. More than 2000 sellers have been trained during this period. We have
                                further improved our training methods to enhance your learning.</p>
                            <p style="text-align: center;"><strong>Smart Learn:</strong></p>
                            <p>We launched our self-paced learning platform, Smart Learn, with returns module. The
                                response has been fabulous with many sellers getting certified on Returns. They have
                                also found the content helpful and easy to understand. With this in mind, we have
                                launched three new modules – Payments &amp; Settlements, Listings &amp; Cataloguing and
                                Trust &amp; Safety. So, go to the Seller Learning Center, get certified and improve your
                                business operations.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <h5>What can we do for you ?</h5>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                             <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Traning
                        </a>
                      </h4>
                
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                             <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Best Quality
                        </a>
                      </h4>
                
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                             <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Fastest Delivery
                        </a>
                      </h4>
                
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.</div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                             <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Customer Care
                        </a>
                      </h4>
                
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.</div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                             <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Over 200 Satisfied Customer
                        </a>
                      </h4>
                
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                             <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                          Section
                        </a>
                      </h4>
                
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.</div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
  {{-- Footer start  --}}

  @include('seller_registration.footer')
  {{-- Footer END  --}}



    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
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
                     $('#forget-password').removeClass('d-none');
                    $('#login-form').addClass('d-none');

                 }
                 else if($('#login-form').hasClass('d-none')){
                    $('#login-form').removeClass('d-none');
                    $('#forget-password').addClass('d-none');

                 }
            });
        });
    </script>
</body>

</html>