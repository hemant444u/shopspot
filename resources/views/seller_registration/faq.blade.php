<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
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

            <div class="col-sm-12">
                <h5 class="mb-3">Getting Started</h5>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Why should I sell on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in show" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body">Shopspot is just a starter in Indian e-commerce with maximum online
                                reach and credibility. We are setting a target to reach lakhs of satisfied registered
                                customers, millions daily page visits and 80 lakh shipments every month to over 1000
                                cities, we trying to be the strongest partner to take your products to customers all
                                over India

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Who can sell on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="wpb_wrapper">
                                    <p>Anyone selling new and genuine products is welcome. In order to start selling,
                                        you need to have the following:</p>
                                    <ul>
                                        <li>GSTIN</li>
                                        <li>PAN Card (Personal PAN for business type “Proprietorship” and Personal +
                                            Business PAN for business type as “Company”)</li>
                                        <li>GSTIN/TIN Number (not mandatory for few categories)</li>
                                        <li>Bank account and supporting KYC documents (Address Proof, and Cancelled
                                            cheque)</li>
                                        <li>Minimum of 5 unique products to sell</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    How do I sell on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="wpb_wrapper">
                                    <p>To sell on Shopspot:</p>
                                    <ul>
                                        <li>Register yourself at&nbsp;<a
                                                href="https://seller.flipkart.com/">shopspot.in</a>.</li>
                                        <li>List your products under specific product categories.</li>
                                        <li>Once an order is received, pack the product and mark it as ‘Ready to
                                            Dispatch’. Our logistics partner will pick up the product and deliver it to
                                            the customer.</li>
                                        <li>Once an order is successfully dispatched, Shopspot will settle your payment
                                            within 7-15 business days based on your seller tier.</li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Can I offer both products and services on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingFour">
                            <div class="panel-body">
                                <p>Currently, you can sell only products and not services on Shopspot.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Do I need to courier my products to Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingFive">
                            <div class="panel-body">
                                <p>No, Shopspot &nbsp;will handle shipping of your products. All you need to do is pack
                                    the product and keep it ready for dispatch. Our logistics partner will pick up the
                                    product from you and deliver it to the customer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    What are the documents required to register as a seller on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div>
                                    <p>You are required to have the following documents:</p>
                                    <ul>
                                        <li>GSTIN</li>
                                        <li>PAN Card(Personal PAN for business type “Proprietorship” and Personal +
                                            Business PAN for business type as “Company”)</li>
                                        <li>GSTIN/TIN Number (not mandatory for few categories)</li>
                                        <li>Bank account and supporting KYC documents ( Address Proof, and Cancelled
                                            Cheque)</li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading7">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse7"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Who decides the price of the products?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse7" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>As a seller, you will set the price of your products.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading8">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse8"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Will I get charged for listing products on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse8" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>No. Listing of products on Shopspot.in is absolutely free. Shopspot does not charge
                                    anything&nbsp;for listing your catalogue online. You only pay a small commission for
                                    what you sell</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse9"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Who takes care of the delivery of my products?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse9" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>Our logistics partner will pick up the product from you and deliver it to the
                                    customer. All you need to do is keep it&nbsp;packed and ready for dispatch.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading10">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse10"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    How and when will I get paid?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse10" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>The payment will be made directly to your bank account through NEFT transactions.
                                    Shopspot will settle your payments within 7-15 business days based on your seller
                                    tier.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse11"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    When can I start selling?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse11" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>After all the required documents have been verified and your seller profile is
                                    complete, you can start listing your products and start selling.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse12"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    How many listings are required to start selling?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse12" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>You are required to have a minimum of 5 listings(unique products) to start selling on
                                    Shopspot.</p>
                            </div>

                        </div>
                    </div>
                    {{-- <h5 class="mb-3 mt-5">Getting Started</h5>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse13"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Why should I sell on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse13" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>Shopspot is just a starter in Indian e-commerce with maximum online reach and
                                    credibility. We are setting a target to reach lakhs of satisfied registered
                                    customers, millions daily page visits and 80 lakh shipments every month to over 1000
                                    cities, we trying to be the strongest partner to take your products to customers all
                                    over India</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse14"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Who can sell on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse14" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>Shopspot is just a starter in Indian e-commerce with maximum online reach and
                                    credibility. We are setting a target to reach lakhs of satisfied registered
                                    customers, millions daily page visits and 80 lakh shipments every month to over 1000
                                    cities, we trying to be the strongest partner to take your products to customers all
                                    over India</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse15"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Who can sell on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse15" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="wpb_wrapper">
                                    <p>Anyone selling new and genuine products is welcome. In order to start selling,
                                        you need to have the following:</p>
                                    <ul>
                                        <li>GSTIN</li>
                                        <li>PAN Card (Personal PAN for business type “Proprietorship” and Personal +
                                            Business PAN for business type as “Company”)</li>
                                        <li>GSTIN/TIN Number (not mandatory for few categories)</li>
                                        <li>Bank account and supporting KYC documents (Address Proof, and Cancelled
                                            cheque)</li>
                                        <li>Minimum of 5 unique products to sell</li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse16"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    How do I sell on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse16" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="wpb_wrapper">
                                    <p>To sell on Shopspot:</p>
                                    <ul>
                                        <li>Register yourself at&nbsp;<a
                                                href="https://seller.flipkart.com/">shopspot.in</a>.</li>
                                        <li>List your products under specific product categories.</li>
                                        <li>Once an order is received, pack the product and mark it as ‘Ready to
                                            Dispatch’. Our logistics partner will pick up the product and deliver it to
                                            the customer.</li>
                                        <li>Once an order is successfully dispatched, Shopspot will settle your payment
                                            within 7-15 business days based on your seller tier.</li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse17"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Can I offer both products and services on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse17" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>Currently, you can sell only products and not services on Shopspot.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse18"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Do I need to courier my products to Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse18" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>No, Shopspot &nbsp;will handle shipping of your products. All you need to do is pack
                                    the product and keep it ready for dispatch. Our logistics partner will pick up the
                                    product from you and deliver it to the customer.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse19"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    What are the documents required to register as a seller on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse19" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="wpb_wrapper">
                                    <p>You are required to have the following documents:</p>
                        <ul>
                        <li>GSTIN</li>
                        <li>PAN Card(Personal PAN for business type “Proprietorship” and Personal + Business PAN for business type as “Company”)</li>
                        <li>GSTIN/TIN Number (not mandatory for few categories)</li>
                        <li>Bank account and supporting KYC documents ( Address Proof, and Cancelled Cheque)</li>
                        </ul>
                        
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse20"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Who decides the price of the products?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse20" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>As a seller, you will set the price of your products.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse21"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Will I get charged for listing products on Shopspot?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse21" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>No. Listing of products on Shopspot.in is absolutely free. Shopspot does not charge anything&nbsp;for listing your catalogue online. You only pay a small commission for what you sell</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse22"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    Who takes care of the delivery of my products?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse22" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>Our logistics partner will pick up the product from you and deliver it to the customer. All you need to do is keep it&nbsp;packed and ready for dispatch.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse23"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    How and when will I get paid?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse23" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>The payment will be made directly to your bank account through NEFT transactions. Shopspot will settle your payments within 7-15 business days based on your seller tier.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse24"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    When can I start selling?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse24" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>After all the required documents have been verified and your seller profile is complete, you can start listing your products and start selling.</p>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse25"
                                    aria-expanded="false" aria-controls="collapseSix">
                                    How many listings are required to start selling?
                                </a>
                            </h4>

                        </div>
                        <div id="collapse25" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>You are required to have a minimum of 5 listings(unique products) to start selling on Shopspot.</p>
                            </div>

                        </div>
                    </div> --}}
                    
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