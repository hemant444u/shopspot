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
        <li>Product</li>
        <li>Courier pickup</li>
        <li>Seller</li>
        <li>Store</li>
        <li>Payment</li>
     
        <li>Ready!</li>
                </ol>
                <div class="wc-setup-content">
                    <!-- Welcome Page UI  -->
                    <h1>Welcome to Shopspot.in!</h1>
                    <p>
                      Thank you for choosing Shopspot! This quick setup wizard will help
                      you to configure the basic settings and you will have your store
                      ready in no time.
                    </p>
                    <p>
                      If you don't want to go through the wizard right now, you can skip
                      and return to the dashboard. You may setup your store from
                      dashboard › setting anytime!
                    </p>
                    <p class="wc-setup-actions step mt-5">
                      <a
                        href="{{url('/store/setup/product')}}"
                        class="button-primary button button-large button-next wcfm_submit_button"
                        >Let's go!</a
                      >
        
                     
                    </p> 
                    <!-- Welcome Page UI END  -->

                    {{-- <!-- Product Category UI -->
                    @include('seller_registration.seller-details.product')
                    <!-- Product Category UI -->

                    <!-- Seller verification  -->
                   @include('seller_registration.seller-details.seller-details') --}}
                </div>
             
            </div>
  
            <!-- Seller verification End  -->




        </div>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>