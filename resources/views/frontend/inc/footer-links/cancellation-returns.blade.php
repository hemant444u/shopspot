
@extends('frontend.layouts.app')

@section('content')
@include('frontend.inc.footer-links.style')
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
    table td, table th {
padding: .75rem;
line-height: 1.5;
vertical-align: top;
border-top: 1px solid #eceeef;
}
         .header-m{
            margin-bottom: 40px;
         }

</style>
<body>
    <div class="container py-4">
        <h1 class="text-center header-m">Cancellation and Return</h1>
        <div class="entry-content">
            <p><strong>If I request for a replacement, when will I get it?</strong></p>
    <p>Visit My Orders to check the status of your replacement.</p>
    <p>In most locations, the replacement item is delivered to you at the time of pick-up. In all other areas, the replacement is initiated after the originally delivered item is picked up. Please check the SMS &amp; email we send you for your replacement request for more details.</p>
    <p><strong>Can items be returned after the time period mentioned in the seller’s Returns Policy?</strong></p>
    <p>No, sellers will not be able to accept returns after the time period mentioned in the seller’s Returns Policy.</p>
    <p><strong>Do I have to return the freebie when I return a product?</strong></p>
    <p>Yes, the freebie has to be returned along with the product.</p>
    <p><strong>How do returns work?</strong></p>
    <p>You can raise a request to return your items with these simple steps:</p>
    <ol>
    <li>Log into your Shopspot.in account</li>
    <li>Go to My Orders</li>
    <li>Click on ‘Return’ against the item you wish to return or exchange</li>
    <li>Fill in the details and raise a return request</li>
    </ol>
    <p>Once you raise a request, you’ll get an email and SMS confirming that your request is being processed. Based on the item, your request may be automatically approved or you may be contacted for more details. If the request is approved, the item will be picked up after which you will get a replacement or refund. You can also track the status of your return request instantly from the ‘My Orders’ section of your Shopspot.in account.</p>
    <p><strong>I see the ‘Cancel’ button but I can’t click on it. Why?</strong></p>
    <p>A greyed out and disabled ‘Cancel’ button can mean any one of the following:</p>
    <ol>
    <li>The item has been delivered already</li>
    </ol>
    <p>OR</p>
    <ol start="2">
    <li>The item is non-refundable (e.g. Gift Card)</li>
    </ol>
    <p><strong>Which products are not eligible for returns?</strong></p>
    <p>The following table contains a list of products that are not eligible for returns as per the seller’s Returns Policy:</p>
    <p>&nbsp;</p>
    <table style="height: 1158px;" width="995">
    <tbody>
    <tr>
    <td>Category</td>
    <td>Products that can’t be returned</td>
    </tr>
    <tr>
    <td>Auto Accessories</td>
    <td>Additives, Air Fresheners, Brighteners, Cleaners, Bike/Car Stickers, Degreasers, Dent/Scratch Removers, Filler Putty, Headlight Vinyl Films, Liquid Solutions, Lubricants, Polish, Power Steering Fluids, Sealants, Oils and Wax</td>
    </tr>
    <tr>
    <td>Automobiles</td>
    <td>Cars, Mopeds, Motorcycles and Scooters</td>
    </tr>
    <tr>
    <td>Bath and Spa</td>
    <td>Bath Bubble/Salt/Sponge/Wash, Body Wash, Loofahs, Scrubs, Shampoos and Soaps</td>
    </tr>
    <tr>
    <td>Baby Care</td>
    <td>Bottle Nipples, Breast Nipple Care, Breast Pumps, Diapers, Ear Syringes, Nappy, Wet Reminder, Wipes and Wipe Warmers</td>
    </tr>
    <tr>
    <td>Cleaning Products</td>
    <td>Cleaning Gels, Detergents, Detergent Pods, Fabric Wash Products, Surface Cleaners, Stain Removers and Washing Bars/Powder</td>
    </tr>
    <tr>
    <td>Computer Accessories</td>
    <td>Blank/Educational Media, CDs/DVDs, Ink Toners, Music, Movies and Software</td>
    </tr>
    <tr>
    <td>Food and Nutrition</td>
    <td>Canned Food, Condiments, Drinks, Fruits, Health Supplements, Meat, Seafood, Syrups, Vegetables and other Edible Products</td>
    </tr>
    <tr>
    <td>Fashion</td>
    <td>Baby Dolls, Clothing Freebies, Lingerie Wash-bags, Shapewear, Socks, Stockings and Swimsuits</td>
    </tr>
    <tr>
    <td>Footwear Accessories</td>
    <td>Oils, Glue, Grease, Socks, Shoe Deodorants/Polish Creams/Sprays and Wax</td>
    </tr>
    <tr>
    <td>Gardening Products</td>
    <td>Plant Saplings, Plant Seeds and Soil Manure</td>
    </tr>
    <tr>
    <td>Health Care</td>
    <td>Antiseptic, Band Aid, Body Pain Relief, Eye Drops, First Aid Tape, Glucometer Lancet/Strip, Healthcare Devices and Kits, Medical Dressing/Gloves and pH Test Strip</td>
    </tr>
    <tr>
    <td>Home Products</td>
    <td>Adhesives, Barbeque wood, Bird/Insect Repellent, Contact Cement, Crack Fillers, Inks, Guitar/Yoyo Friction Stickers, Marker Refills, Mosquito Coil/Vaporiser/Vaporiser Refills, Naphthalene Balls, Scuba/Smoking-Pipe Mouthpieces and Sprays</td>
    </tr>
    <tr>
    <td>Hygiene</td>
    <td>Cannula, Contact Lens, e-Hookah, Fake Moustache, Female Urination Devices, Menstrual Cups, Needles, Panty Liners, Shaving Products, Smoking Patch, Straws, Sweat Pads, Tampons, Teeth Whitening Products/Wipes, Tissues, Toilet Tissue Aid, Toilet Rolls and Women Intimate Care</td>
    </tr>
    <tr>
    <td>Innerwear</td>
    <td>Bra Accessories, Briefs, Boxers, Lingerie Sets, Panty, Garter, Trunks and Vests</td>
    </tr>
    <tr>
    <td>Jewellery</td>
    <td>Coins</td>
    </tr>
    <tr>
    <td>Music Instrument Accessories</td>
    <td>Mouthpiece Cap/Pad/Set, Oils and Polish</td>
    </tr>
    <tr>
    <td>Party Supplies</td>
    <td>Balloons, Candles, Cut-outs, Decoration articles and Whistles</td>
    </tr>
    <tr>
    <td>Festive Supplies</td>
    <td>Hookah Charcoal/Flavor/Mouth-tip, Incense Sticks and Holi/Rangoli Color</td>
    </tr>
    <tr>
    <td>Personal Care</td>
    <td>Conditioners, Creams, Deodorants, Electric Ear Cleaners, Eyebrow/Eyelash/Hair Styling Products, Eye Mask, Face Wash, Face Care/Fairness Products, Fragrance, Fresheners, Gels, Hair Care, Kajal, Lens Solution, Lip Plumper/Stain, Blackhead/Makeup/Nail Paint Removers, Mascara, Mehendi, Nail Sanding Pad, Oils, Oral Hygiene Products, Perfumes, Hand/Toothbrush Sanitizers, Serums, Talc, Sunscreen, Tanning Liquid, Tattoo, Toners and Wigs</td>
    </tr>
    <tr>
    <td>Pet Supplies</td>
    <td>Aquarium Consumables, Hair Styling, Health Care/Medicinal Products, Horse Girth/Grooming Kit/Braid Tail Bag/Hay/Liniment/Poultice, Inhaler Masks, Litter Box Enclosures, Litter Scoops, Pet Chew, Pet Food/Treat, Pet Pad, Pet Hygiene/Personal Care Products, Poultice, Tail Wraps, Waste Bags and Water Troughs</td>
    </tr>
    <tr>
    <td>Sexual Wellness</td>
    <td>Condoms, Fertility Kit/Supplement, Lubricants, Pregnancy Kits, Sexual Massagers, Sexual/Pleasure Enhancement Products and Vaginal Dilators</td>
    </tr>
    </tbody>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
        </div>
    
    </div>
    @include('frontend.inc.footer-links.site-footer')
</body>
@endsection
