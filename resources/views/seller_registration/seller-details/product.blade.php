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
            padding: 12px 6px!important;
          }
        }
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
        <li class="active">Product</li>
        <li >Courier pickup</li>
        <li>Seller</li>
        <li >Store</li>
        <li>Payment</li>
        <li>Ready!</li>
    </ol>
                
                <div class="wc-setup-content">
                    <h3>Store Product Category</h3>
                    <p>Choose categories you wish to sell</p>
                    <form id="product-form" method="POST" action="{{ route('store-product-details') }}" >
                    @csrf
                    <div class="row">
                      <div class="col-sm-4">
                        <p><b>Books, Movies & Games</b></p>
                        <ul class="list-unstyled">
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="books[]" type="checkbox" value="books" id="books">
                                <label class="form-check-label" for="books">
                                   Books
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="books[]" type="checkbox" value="movies" id="movies">
                                <label class="form-check-label" for="movies">
                                   Movies
                                </label>
                              </div>
                          </li>
                            <li>
                            <div class="form-check">
                                <input class="form-check-input" name="books[]" type="checkbox" value="musical instruments" id="musical">
                                <label class="form-check-label" for="musical">
                                   Musical Instruments
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="books[]" type="checkbox" value="music" id="music">
                                <label class="form-check-label" for="music">
                                   Music
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="books[]" type="checkbox" value="video games" id="video-games">
                                <label class="form-check-label" for="video-games">
                                   Video Games
                                </label>
                              </div>
                          </li>
                         
                        </ul>
                      </div>
                      <div class="col-sm-4">
                        <p><b>Home, Garden & Tools, Furniture</b></p>
                        <ul class="list-unstyled">
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="home[]" type="checkbox" value="home" id="Home">
                                <label class="form-check-label" for="Home">
                                   Home
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="home[]" type="checkbox" value="large appliances" id="Appliances">
                                <label class="form-check-label" for="Appliances">
                                   Large Appliances
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="home[]" type="checkbox" value="pet supplies" id="Pet">
                                <label class="form-check-label" for="Pet">
                                   Pet Supplies
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="home[]" type="checkbox" value="kitchen" id="Kitchen">
                                <label class="form-check-label" for="Kitchen">
                                   Kitchen
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="home[]" type="checkbox" value="furniture" id="Furniture">
                                <label class="form-check-label" for="Furniture">
                                   Furniture
                                </label>
                              </div>
                          </li>
                         
                        </ul>
                      </div>
                      <div class="col-sm-4">
                      <p><b>Electronics & Computers</b></p>
                      <ul class="list-unstyled">
                        <li>
                          <div class="form-check">
                              <input class="form-check-input" name="electronics[]" type="checkbox" value="consumer electronics" id="Consumer">
                              <label class="form-check-label" for="Consumer">
                                 Consumer Electronics
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" name="electronics[]" type="checkbox" value="moblie phones" id="Moblie">
                                <label class="form-check-label" for="Moblie">
                                   Moblie Phones
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="electronics[]" type="checkbox" value="personal computer" id="Personal">
                                <label class="form-check-label" for="Personal">
                                   Personal Computer
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="electronics[]" type="checkbox" value="office products" id="Office">
                                <label class="form-check-label" for="Office">
                                   Office Products 
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="electronics[]" type="checkbox" value="software" id="Software">
                                <label class="form-check-label" for="Software">
                                   Software 
                                </label>
                              </div>
                          </li>
                      </ul>
                    </div>
                    <div class="col-sm-4">
                        <p><b>Clothing, Shoes & Jewellery</b></p>
                        <ul class="list-unstyled">
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="clothing[]" type="checkbox" value="clothing" id="Clothing">
                                <label class="form-check-label" for="Clothing">
                                Clothing
                                </label>
                              </div>
                          </li>
                          <li>
                              <div class="form-check">
                                  <input class="form-check-input" name="clothing[]" type="checkbox" value="shoes" id="Shoes">
                                  <label class="form-check-label" for="Shoes">
                                     Shoes
                                  </label>
                                </div>
                            </li>
                            <li>
                              <div class="form-check">
                                  <input class="form-check-input" name="clothing[]" type="checkbox" value="watches" id="Watches">
                                  <label class="form-check-label" for="Watches">
                                     Watches
                                  </label>
                                </div>
                            </li>
                            <li>
                              <div class="form-check">
                                  <input class="form-check-input" name="clothing[]" type="checkbox" value="jewellery" id="Jewellery">
                                  <label class="form-check-label" for="Jewellery">
                                    Jewellery 
                                  </label>
                                </div>
                            </li>
                            <li>
                              <div class="form-check">
                                  <input class="form-check-input" name="clothing[]" type="checkbox" value="luggage" id="Luggage">
                                  <label class="form-check-label" for="Luggage">
                                     Luggage 
                                  </label>
                                </div>
                            </li>
                        </ul>
                      </div>
                      <div class="col-sm-4">
                        <p><b>Beauty, Health & Groceries</b></p>
                        <ul class="list-unstyled">
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="beauty[]" type="checkbox" value="beauty" id="Beauty">
                                <label class="form-check-label" for="Beauty">
                                Beauty
                                </label>
                              </div>
                          </li>
                          <li>
                              <div class="form-check">
                                  <input class="form-check-input"  name="beauty[]" type="checkbox" value="grocery" id="Grocery">
                                  <label class="form-check-label" for="Grocery  ">
                                     Grocery
                                  </label>
                                </div>
                            </li>
                            <li>
                              <div class="form-check">
                                  <input class="form-check-input"  name="beauty[]" type="checkbox" value="health" id="Health">
                                  <label class="form-check-label" for="Health">
                                     Health
                                  </label>
                                </div>
                            </li>
                            <li>
                              <div class="form-check">
                                  <input class="form-check-input"  name="beauty[]" type="checkbox" value="personal care appliances " id="care">
                                  <label class="form-check-label" for="care">
                                    Personal Care Appliances 
                                  </label>
                                </div>
                            </li>
                           
                        </ul>
                      </div>
                      <div class="col-sm-4">
                        <p><b>Toys & Baby, Sports</b></p>
                        <ul class="list-unstyled">
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="toys[]" type="checkbox" value="baby" id="Baby">
                                <label class="form-check-label" for="Baby">
                                Baby
                                </label>
                              </div>
                          </li>
                          <li>
                              <div class="form-check">
                                  <input class="form-check-input" name="toys[]" type="checkbox" value="toys" id="Toys">
                                  <label class="form-check-label" for="Toys">
                                     Toys
                                  </label>
                                </div>
                            </li>
                            <li>
                              <div class="form-check">
                                  <input class="form-check-input" name="toys[]" type="checkbox" value="sporting goods" id="goods">
                                  <label class="form-check-label" for="goods">
                                     Sporting Goods
                                  </label>
                                </div>
                            </li>
        
                        </ul>
                      </div>
                      <div class="col-sm-4">
                        <p><b>Automotive and Industrial Supply</b></p>
                        <ul class="list-unstyled">
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="automotive[]" type="checkbox" value="automotive" id="Automotive">
                                <label class="form-check-label" for="Automotive">
                                Automotive
                                </label>
                              </div>
                          </li>
                          <li>
                              <div class="form-check">
                                  <input class="form-check-input" name="automotive[]" type="checkbox" value="industrial supply" id="Industrial">
                                  <label class="form-check-label" for="Industrial">
                                     Industrial Supply
                                  </label>
                                </div>
                            </li>
                        </ul>
                      </div>
                      <div class="col-sm-4">
                        <p><b>Other</b></p>
                        <ul class="list-unstyled">
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="others[]" type="checkbox" value="my category is not here" id="Categorynot">
                                <label class="form-check-label" for="Categorynot">
                                My Category is not here
                                </label>
                              </div>
                          </li>
                         
                        </ul>
                      </div>
                      <div class="col-sm-6">
                        <p><b>Where do you get products from?</b></p>
                        <ul class="list-unstyled">
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="products_from[]" type="checkbox" value="i manufacture them" id="manufacture">
                                <label class="form-check-label" for="manufacture">
                               I manufacture them
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="products_from[]" type="checkbox" value="i resell product that i buy" id="resell">
                                <label class="form-check-label" for="resell">
                               I resell product that i buy
                                </label>
                              </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col-sm-6">
                        <p style="visibility: hidden;"><b>Where do you get products from?</b></p>
                        <ul class="list-unstyled">
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="products_from[]" type="checkbox" value="i sell products manufactured from me" id="sellmanufacture">
                                <label class="form-check-label" for="sellmanufacture">
                              I sell products manufactured from me
                                </label>
                              </div>
                          </li>
                          <li>
                            <div class="form-check">
                                <input class="form-check-input" name="products_from[]" type="checkbox" value="i import them" id="import">
                                <label class="form-check-label" for="import">
                               I import them
                                </label>
                              </div>
                          </li>
                        </ul>
                      </div>
                  
                     <p class="wc-setup-actions step mt-5 mx-auto">
                        <a
                          href="javascript:void(0)"
                          onclick="document.getElementById('product-form').submit();"
                          class="button-primary button button-large button-next wcfm_submit_button"
                          >Continue</a
                        >
          
                        {{-- <a
                          href="{{url('/store/setup/courier-pickup')}}"
                          class="button button-large"
                          >Skip this step</a
                        > --}}
                      </p>  
                         </div> 
                    </form>
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
                
                
                
       