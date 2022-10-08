@extends('frontend.layouts.app')

@section('content')
<style>
    body {
        overflow-x: hidden;
        font-family: "Open Sans";
        font-size: 14px;
        color: #333e48;
    }

    label,
    small,
    input,
    h1,p,strong {
        color: #333e48;
        letter-spacing: -0.025em;
    }

         .header-m{
            margin-bottom: 40px;
         }

</style>
@include('frontend.inc.footer-links.style')
<body>
   

    <div class="container">
        <h1 class="text-center header-m">Payment</h1>
        <div class="entry-content">
            <p><strong>How do I pay for a Shopspot.in purchase?</strong></p>
    <p>Shopspot.in offers you multiple payment methods. Whatever your online mode of payment, you can rest assured that Shopspot.in trusted payment gateway partners use secure encryption technology to keep your transaction details confidential at all times.</p>
    <p>You may use Internet Banking, Gift Card, Cash on Delivery and Wallet to make your purchase.</p>
    <p>Shopspot.in also accepts payments made using Visa, MasterCard, Maestro and American Express credit/debit cards in India and 21 other countries.</p>
    <p><strong>Is there any hidden charge when I make a purchase on Shopspot.in?</strong></p>
    <p>here are NO hidden charges when you make a purchase on Shopspot.in. The prices listed for all the items are final and all-inclusive. The price you see on the product page is exactly what you pay.</p>
    <p>Delivery charges may be extra depending on the seller policy. Please check individual seller for the same. In case of seller WS Retail, the ₹50 delivery charge is waived off on orders worth ₹500 and over.</p>
    <p><strong>What is Cash on Delivery?</strong></p>
    <p>If you are not comfortable making an online payment on Shopspot.in, you can opt for the Cash on Delivery (C-o-D) payment method instead. With C-o-D you can pay in cash at the time of actual delivery of the product at your doorstep, without requiring you to make any advance payment online.</p>
    <p>The maximum order value for Cash on Delivery (C-o-D) payment is ₹20,000. It is strictly a cash-only payment method. Gift Cards or store credit cannot be used for C-o-D orders. Foreign currency cannot be used to make a C-o-D payment. Only Indian Rupees accepted.</p>
    <p><strong>How do I pay using a credit/debit card?</strong></p>
    <p>We accept payments made by credit/debit cards issued in India and 21 other countries.</p>
    <p><strong>Credit cards</strong></p>
    <p>We accept payments made using Visa, MasterCard and American Express credit cards.</p>
    <p>To pay using your credit card at checkout, you will need your card number, expiry date, three-digit CVV number (found on the backside of your card). After entering these details, you will be redirected to the bank’s page for entering the online 3D Secure password.</p>
    <p><strong>Debit cards</strong></p>
    <p>We accept payments made using Visa, MasterCard and Maestro debit cards.</p>
    <p>To pay using your debit card at checkout, you will need your card number, expiry date (optional for Maestro cards), three-digit CVV number (optional for Maestro cards). You will then be redirected to your bank’s secure page for entering your online password (issued by your bank) to complete the payment.</p>
    <p>Internationally issued credit/debit cards cannot be used for Flyte, Wallet and eGV payments/top-ups.</p>
    <p><strong>Is it safe to use my credit/debit card on Shopspot.in?</strong></p>
    <p>Your online transaction on Shopspot.in is secure with the highest levels of transaction security currently available on the Internet. Shopspot.in uses 256-bit encryption technology to protect your card information while securely transmitting it to the respective banks for payment processing.</p>
    <p>All credit card and debit card payments on Shopspot.in are processed through secure and trusted payment gateways managed by leading banks. Banks now use the 3D Secure password service for online transactions, providing an additional layer of security through identity verification.</p>
    <p>&nbsp;</p>
    <p><strong>What steps does Shopspot.in take to prevent card fraud?</strong></p>
    <p>Shopspot.in realizes the importance of a strong fraud detection and resolution capability. We and our online payments partners monitor transactions continuously for suspicious activity and flag potentially fraudulent transactions for manual verification by our team.</p>
    <p>In the rarest of rare cases, when our team is unable to rule out the possibility of fraud categorically, the transaction is kept on hold, and the customer is requested to provide identity documents. The ID documents help us ensure that the purchases were indeed made by a genuine card holder. We apologise for any inconvenience that may be caused to customers and request them to bear with us in the larger interest of ensuring a safe and secure environment for online transactions.</p>
    <p><strong>What is a 3D Secure password?</strong></p>
    <p>The 3D Secure password is implemented by VISA and MasterCard in partnership with card issuing banks under the “Verified by VISA” and “Mastercard SecureCode” services, respectively.</p>
    <p>The 3D Secure password adds an additional layer of security through identity verification for your online credit/debit card transactions. This password, which is created by you, is known only to you. This ensures that only you can use your card for online purchases.</p>
    <p><strong>Can I use my bank’s Internet Banking feature to make a payment?</strong></p>
    <p>Yes. Shopspot.in offers you the convenience of using your bank’s Internet Banking service to make a payment towards your order. With this you can directly transfer funds from your bank account, while conducting a highly secure transaction.</p>
    <p><strong>Can I make a credit/debit card or Internet Banking payment on Shopspot.in through my mobile?</strong></p>
    <p>Yes, you can make credit card payments through the Shopspot.in mobile site and application. Shopspot.in uses 256-bit encryption technology to protect your card information while securely transmitting it to the secure and trusted payment gateways managed by leading banks.</p>
    <p><strong>How does ‘Instant Cashback’ work?</strong></p>
    <p>The ‘Cashback’ offer is instant and exclusive to Shopspot.in. You only pay the final price you see in your shopping cart.</p>
    <p><strong>How do I place Cash on Delivery (C-o-D) order?</strong></p>
    <p>All items that have the “Cash on Delivery Available” icon are valid for order by Cash on Delivery.</p>
    <p>Add the item(s) to your cart and proceed to checkout. When prompted to choose a payment option, select “Pay By Cash on Delivery”. Enter the CAPTCHA text as shown, for validation.</p>
    <p>Once verified and confirmed, your order will be processed for shipment in the time specified, from the date of confirmation. You will be required to make a cash-only payment to our courier partner at the time of delivery of your order to complete the payment.</p>
    <p><strong>Terms &amp; Conditions:</strong></p>
    <ul>
    <li>The maximum order value for C-o-D is ₹20,000</li>
    <li>Gift Cards or Store Credit cannot be used for C-o-D orders</li>
    <li>Cash-only payment at the time of delivery.</li>
    </ul>
        </div>
    </div>


    @include('frontend.inc.footer-links.site-footer')
</body>
@endsection