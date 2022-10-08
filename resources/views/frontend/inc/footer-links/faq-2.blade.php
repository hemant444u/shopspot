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
    h1,
    p,
    strong {
      color: #333e48;
      letter-spacing: -0.025em;
    }
    table td,
    table th {
      padding: 0.75rem;
      line-height: 1.5;
      vertical-align: top;
      border-top: 1px solid #eceeef;
    }
    .header-m {
      margin-bottom: 40px;
    }
  </style>
@include('frontend.inc.footer-links.style')
<body>

    <div class="container py-4">
        <h1 class="text-center header-m">FAQ</h1>
        <div class="entry-content">
			<p><strong>Why do I see different prices for the same product?</strong></p>
<p>You could see different prices for the same product, as it could be listed by many Sellers.</p>
<p><strong>Is installation offered for all products?</strong></p>
<p>Installation and demo are offered for certain items by sellers through the brand or an authorised service provider. Please check the individual product page to see if these services are offered for the item.</p>
<p><strong>Is it necessary to have an account to shop on Shopspot.in?</strong></p>
<p>Yes, it’s necessary to log into your Shopspot.in account to shop. Shopping as a logged-in user is fast &amp; convenient and also provides extra security.You’ll have access to a personalised shopping experience including recommendations and quicker check-out.</p>
<p><strong>What does ‘Preorder’ or ‘Forthcoming’ mean?</strong></p>
<p>Items marked as ‘Preorder’ or ‘Forthcoming’ are expected to be released soon and you can pre-book them with sellers. Such items will be shipped after their official release by the seller with whom you’ve pre-booked them.</p>
<p><strong>What does ‘Preorder’ or ‘Forthcoming’ mean?</strong></p>
<p>Items marked as ‘Preorder’ or ‘Forthcoming’ are expected to be released soon and you can pre-book them with sellers. Such items will be shipped after their official release by the seller with whom you’ve pre-booked them.</p>
<p><strong>Do sellers on Shopspot.in ship internationally?</strong></p>
<p>Currently, sellers on Shopspot.in only ship within India.</p>
<p><strong>Can I use an item that has been given to me as a gift from a state sponsored or an NGO-funded freebie distribution programme to get discounts through exchange offers?</strong></p>
<p>No, as per company policy, such items are not eligible for discounts under exchange offers. You can also refer to the ‘Exchange Offers’ section in the ‘Terms of Use’ page for more details.</p>
<p>&nbsp;</p>
		</div>
        </div>

    @include('frontend.inc.footer-links.site-footer')
</body>
@endsection