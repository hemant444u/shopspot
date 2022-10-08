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
    <div class="container py-4">
        <h1 class="text-center header-m">Shipping</h1>
        <div class="entry-content">
			<p><strong>What are the delivery charges?</strong></p>
<p>Delivery charge varies with each Seller.Sellers incur relatively higher shipping costs on low value items. In such cases, charging a nominal delivery charge helps them offset logistics costs. Please check your order summary to understand the delivery charges for individual products.</p>
<p><strong>Why does the delivery date not correspond to the delivery timeline of X-Y business days?</strong></p>
<p>It is possible that the Seller or our courier partners have a holiday between the day placed your order and the date of delivery, which is based on the timelines shown on the product page. In this case, we add a day to the estimated date. Some courier partners and Sellers do not work on Sundays and this is factored in to the delivery dates.</p>
<p><strong>What is the estimated delivery time?</strong></p>
<p>Sellers generally procure and ship the items within the time specified on the product page. Business days exclude public holidays and Sundays.Estimated delivery time depends on the following factors:</p>
<ul>
<li>The Seller offering the product</li>
<li>Product’s availability with the Seller</li>
<li>The destination to which you want the order shipped to and location of the Seller.</li>
</ul>
<p><strong>Are there any hidden costs on items sold by Sellers on Shopspot.in?</strong></p>
<p>There are NO hidden charges when you make a purchase on Shopspot.in. List prices are final and all-inclusive. The price you see on the product page is exactly what you would pay.Delivery charges are not hidden charges and are charged (if at all) extra depending on the Seller’s shipping policy.</p>
<p><strong>Why does the estimated delivery time vary for each seller?</strong></p>
<p>You have probably noticed varying estimated delivery times for sellers of the product you are interested in. Delivery times are influenced by product availability, geographic location of the Seller, your shipping destination and the courier partner’s time-to-deliver in your location.Please enter your default pin code on the product page (you don’t have to enter it every single time) to know more accurate delivery times on the product page itself.</p>
<p><strong>Seller does not/cannot ship to my area. Why?</strong></p>
<p>Please enter your pincode on the product page (you don’t have to enter it every single time) to know whether the product can be delivered to your location.If you haven’t provided your pincode until the checkout stage, the pincode in your shipping address will be used to check for serviceability.Whether your location can be serviced or not depends on</p>
<ul>
<li>Whether the Seller ships to your location</li>
<li>Legal restrictions, if any, in shipping particular products to your location</li>
<li>The availability of reliable courier partners in your location</li>
</ul>
<p>At times Sellers prefer not to ship to certain locations. This is entirely at their discretion.</p>
<p><strong>Why is the CoD option not offered in my location?</strong></p>
<p>Availability of CoD depends on the ability of our courier partner servicing your location to accept cash as payment at the time of delivery.Our courier partners have limits on the cash amount payable on delivery depending on the destination and your order value might have exceeded this limit. Please enter your pin code on the product page to check if CoD is available in your location.</p>
<p><strong>I need to return an item, how do I arrange for a pick-up?</strong></p>
<p>Returns are easy. Contact Us to initiate a return. You will receive a call explaining the process, once you have initiated a return.</p>
<p><strong>What do the different tags like “In Stock”, “Available” mean?</strong></p>
<p>‘In Stock’</p>
<p>For items listed as “In Stock”, Sellers will mention the delivery time based on your location pincode (usually 2-3 business days, 4-5 business days or 4-6 business days in areas where standard courier service is available). For other areas, orders will be sent by Registered Post through the Indian Postal Service which may take 1-2 weeks depending on the location.</p>
<p>‘Available’</p>
<p>The Seller might not have the item in stock but can procure it when an order is placed for the item. The delivery time will depend on the estimated procurement time and the estimated shipping time to your location.</p>
<p>‘Preorder’ or ‘Forthcoming’</p>
<p>Such items are expected to be released soon and can be pre-booked for you. The item will be shipped to you on the day of its official release launch and will reach you in 2 to 6 business days. The Preorder duration varies from item to item. Once known, release time and date is mentioned. (Eg. 5th May, August 3rd week)</p>
<p>‘Out of Stock’</p>
<p>Currently, the item is not available for sale. Use the ‘Notify Me’ feature to know once it is available for purchase.</p>
<p>‘Imported’</p>
<p>Sometimes, items have to be sourced by Sellers from outside India. These items are mentioned as ‘Imported’ on the product page and can take at least 10 days or more to be delivered to you.</p>
<p>‘Back In Stock Soon’</p>
<p>The item is popular and is sold out. You can however ‘book’ an order for the product and it will be shipped according to the timelines mentioned by the Seller.</p>
<p>‘Temporarily Unavailable’</p>
<p>The product is currently out of stock and is not available for purchase. The product could to be in stock soon. Use the ‘Notify Me’ feature to know when it is available for purchase.</p>
<p>‘Permanently Discontinued’</p>
<p>This product is no longer available because it is obsolete and/or its production has been discontinued.</p>
<p>‘Out of Print’</p>
<p>This product is not available because it is no longer being published and has been permanently discontinued.</p>
<p><strong>Does Shopspot.in deliver internationally?</strong></p>
<p>We are accepting orders to be placed and delivered abroad India once the payment is done.</p>
		</div>
        </div>
@include('frontend.inc.footer-links.site-footer')
</body>

@endsection