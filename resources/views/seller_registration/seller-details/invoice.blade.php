<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

    <title>Invoice</title>
    <style>
        body{
            font-family: Roboto;
            line-height:1.8;
        }
        strong{
            font-size: 18px;
        }
        .invoice-number {
            border: 2px dashed black;
            padding: 6px;
            width: 300px;
            font-size: 15px;
        }

        .border-line {
            border: 1px solid #000000;
            width: 100%;
        }

        .keep-invoice {
            display: flex;
            align-items: center;
            height: 100%;
            text-align: right;
        }
        .table thead th {
    border-bottom: 2px solid #000;
    vertical-align: top;
    font-size:18px;
}
.table td, .table th {


    border-top: 2px solid #000;
}
tfoot{
    border-bottom: 2px solid;
}
    </style>
</head>

<body>
    <!-- 
    <div class="container">
        <h1 class="text-center about-us">Career</h1>
        <img src="./img/career.jpg" class="img-fluid">
    </div> -->

    <div class="main container-fluid p-5">
        <h4 class="text-center font-weight-bold">Tax Invoice</h4>
        <div class="row">
            <div class="col-md-8">
                <ul class="list-unstyled">
                    <li>
                        <strong>Sold By: Consulting Rooms Private Limited ,</strong>
                    </li>
                    <li>
                        <strong><i> Ship-from Address:</i></strong>
                        <span><i>Instakart Services Pvt. Ltd. 2C Udyog Kendra, Suraj pur,,
                                Greater Noida II, Gautam Budh Nagar,UP,PIN -201206, Noida,
                                Uttar Pradesh, India - 201206, IN-UP</i></span>
                    </li>
                    <li><strong>GSTIN</strong><span>- 09AAGCC4236P1Z7</span></li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="invoice-number">
                    <strong>Invoice Number</strong>
                    <span># FAB4QF2000013605</span>
                </div>
            </div>
        </div>
        <div class="border-line"></div>

        <div class="row">
            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li><strong>Order ID: OD115623564811956000
                        </strong></li>
                    <li><strong>Order Date:</strong>
                        <span>01-06-2019</span></li>
                    <li><strong>Invoice Date:</strong>
                        <span>03-06-2019</span></li>
                    <li><strong>PAN:</strong><span>aagcc4236p</span></li>
                    <li><strong>CIN:</strong>
                        <span>U74900DL2016PTC291626
                        </span></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li><strong>Bill To <br>
                            Vishnu Kant Gupta </strong></li>
                    <li><span>1/684 gopinathpuram, Shuklaganj
                            unnao.
                        </span></li>
                    <li><span>Unnao District 209861 Uttar Pradesh </span></li>
                    <li><span>Phone: xxxxxxxxxx</span></li>

                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li><strong>Ship To<br>
                            Vishnu Kant Gupta </strong></li>
                    <li><span>1/684 gopinathpuram, Shuklaganj
                            unnao.
                        </span></li>
                    <li><span>Unnao District 209861 Uttar Pradesh </span></li>
                    <li><span>Phone: xxxxxxxxxx</span></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="keep-invoice">
                    <span>*Keep this invoice and <br>
                        manufacturer box for <br>
                        warranty purposes.</span>
                </div>

            </div>
            <div class="col-md-12">
                <span>Total items: 1</span>
            </div>
        </div>
<div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Title</th>
            <th scope="col">Qty</th>
            <th scope="col">Gross Amount ₹</th>
            <th scope="col">Discount ₹ </th>
            <th scope="col">Taxable Value ₹</th>
            <th scope="col">CGST ₹</th>
            <th scope="col">SGST/UTGST ₹</th>
            <th scope="col">Total ₹</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="row">Air Conditioners
                FSN:
                ACNFBPBPQBVM5YHH
                HSN/SAC: 84151010
                </td>
            <td>
                <strong>MarQ by Flipkart 1.0 Ton 3
                    Star Split Inverter AC -
                    White</strong><br>
                    <span>
                        Warranty: 1 Year on Product and 5 Years on Compressor
                    </span><br>
                    <span>1. [IMEI/Serial No:
                        ACNFBPBPQBVM5YHH190301739]
                        </span><br>
                        <strong>CGST: 14.000 %</strong><br>
                        <strong>SGST/UTGST: 14.000 %</strong>
            </td>
            <td>1</td>
            <td>23499.00</td>
            <td>0.00</td>
            <td>18358.60</td>
            <td>2570.20</td>
            <td>2570.20</td>
            <td>23499.00</td>
          </tr>
       
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td><strong>Total</strong></td>
                <td><strong>1</strong></td>
                <td><strong>23499.00 </strong></td>
                <td><strong>0.00</strong></td>
                <td><strong>18358.60</strong></td>
                <td><strong>2570.20 </strong></td>
                <td><strong>2570.20</strong></td>
                <td><strong>23499.00</strong></td>
            </tr>
        </tfoot>
      </table>
</div>
      
<div class="row flex-row-reverse p-4 ">
    <ul class="list-unstyled text-center">
        <li class="d-flex justify-content-between"><h5>Grand Total</h5> <strong>₹ 23499.00</strong></li>
         <li><span>Consulting Rooms Private Limited</span></li>
         <li></li>
         <li>Authorized Signatory</li>
    </ul>
</div>
<div class="border-line"></div>
    </div>
</body>

</html>