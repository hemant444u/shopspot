<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function(){
    return 'yes';
});

//demo
Route::get('/demo/cron_1', 'DemoController@cron_1');
Route::get('/demo/cron_2', 'DemoController@cron_2');

// mailchimp
Route::get('manageMailChimp', 'MailChimpController@manageMailChimp');
Route::post('subscribe',['as'=>'subscribe','uses'=>'MailChimpController@subscribe']);
Route::post('sendCompaign',['as'=>'sendCompaign','uses'=>'MailChimpController@sendCompaign']);

Auth::routes(['verify' => true]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/language', 'LanguageController@changeLanguage')->name('language.change');
Route::post('/currency', 'CurrencyController@changeCurrency')->name('currency.change');
Route::get('cache-clear',function(){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('up');
    Artisan::call('down');
});
Route::get('/social-login/redirect/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/social-login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');
Route::get('/users/login', 'HomeController@login')->name('user.login');
Route::get('/users/registration', 'HomeController@registration')->name('user.registration');
//Route::post('/users/login', 'HomeController@user_login')->name('user.login.submit');
Route::post('/users/login/cart', 'HomeController@cart_login')->name('cart.login.submit');

Route::post('/subcategories/get_subcategories_by_category', 'SubCategoryController@get_subcategories_by_category')->name('subcategories.get_subcategories_by_category');
Route::post('/subsubcategories/get_subsubcategories_by_subcategory', 'SubSubCategoryController@get_subsubcategories_by_subcategory')->name('subsubcategories.get_subsubcategories_by_subcategory');
Route::post('/subsubcategories/get_brands_by_subsubcategory', 'SubSubCategoryController@get_brands_by_subsubcategory')->name('subsubcategories.get_brands_by_subsubcategory');
Route::post('/subsubcategories/get_attributes_by_subsubcategory', 'SubSubCategoryController@get_attributes_by_subsubcategory')->name('subsubcategories.get_attributes_by_subsubcategory');

//Home Page
Route::get('/', 'HomeController@index')->name('home');
Route::post('/home/section/featured', 'HomeController@load_featured_section')->name('home.section.featured');
Route::post('/home/section/best_selling', 'HomeController@load_best_selling_section')->name('home.section.best_selling');
Route::post('/home/section/home_categories', 'HomeController@load_home_categories_section')->name('home.section.home_categories');
Route::post('/home/section/best_sellers', 'HomeController@load_best_sellers_section')->name('home.section.best_sellers');
//category dropdown menu ajax call
Route::post('/category/nav-element-list', 'HomeController@get_category_items')->name('category.elements');

//Flash Deal Details Page
Route::get('/flash-deal/{slug}', 'HomeController@flash_deal_details')->name('flash-deal-details');

Route::get('/sitemap.xml', function(){
	return base_path('sitemap.xml');
});


Route::get('/customer-products', 'CustomerProductController@customer_products_listing')->name('customer.products');
Route::get('/customer-products?subsubcategory={subsubcategory_slug}', 'CustomerProductController@search')->name('customer_products.subsubcategory');
Route::get('/customer-products?subcategory={subcategory_slug}', 'CustomerProductController@search')->name('customer_products.subcategory');
Route::get('/customer-products?category={category_slug}', 'CustomerProductController@search')->name('customer_products.category');
Route::get('/customer-products?city={city_id}', 'CustomerProductController@search')->name('customer_products.city');
Route::get('/customer-products?q={search}', 'CustomerProductController@search')->name('customer_products.search');
Route::get('/customer-product/{slug}', 'CustomerProductController@customer_product')->name('customer.product');
Route::get('/customer-packages', 'HomeController@premium_package_index')->name('customer_packages_list_show');

Route::get('/seller-registrations', 'SellerController@registration')->name('sellerRegPage');
Route::post('/seller-registration', 'SellerController@register')->name('sellerRegistration');
Route::post('/seller/payment-details', 'SellerController@storePayment')->name('seller-payment-details');
Route::post('/seller/store-details', 'SellerController@storeDetails')->name('seller-store-details');
Route::post('/seller/seller-details', 'SellerController@sellerDetails')->name('seller-details');
Route::post('/seller/seller-product-details', 'SellerController@storeProductDetails')->name('store-product-details');
Route::post('/seller/seller-courier-pickup', 'SellerController@storeCourierPickUpDetails')->name('store-courier-pickup');
Route::post('/seller/seller-reset-password', 'SellerController@sendResetLinkEmail')->name('seller.reset-email');
// Store Setup route 
Route::view('/store/setup/welcome', 'seller_registration.seller-details.welcome')->name('seller-welcome');
Route::view('/store/setup/product', 'seller_registration.seller-details.product');
Route::view('/store/setup/seller-details', 'seller_registration.seller-details.seller-details')->name('seller-details-form');
Route::view('/store/setup/store-details', 'seller_registration.seller-details.store-details')->name('store-details-form');
Route::view('/store/setup/payment', 'seller_registration.seller-details.payment')->name('seller-payment-details-form');
Route::view('/store/setup/courier-pickup', 'seller_registration.seller-details.courier-pickup')->name('courier_pickup-form');
// Store Setup route End
// Footer Link route start 
Route::view('/contact-us','frontend.inc.footer-links.contact');
Route::view('/about-us','frontend.inc.footer-links.about');
Route::view('/cancellation-and-return','frontend.inc.footer-links.cancellation-returns');
Route::view('/career','frontend.inc.footer-links.career');
Route::view('/faq-2','frontend.inc.footer-links.faq-2');
Route::view('/payment','frontend.inc.footer-links.payment');
Route::view('/shipping','frontend.inc.footer-links.shipping');

Route::post('/seller-login', 'SellerController@login')->name('sellerLogin');
Route::post('/seller-otp-verification', 'SellerController@verify')->name('otpVerification');
Route::get('/benefits', 'SellerController@benefits');
Route::get('/seller-faq', 'SellerController@sellerFaq');

Route::get('/product/{slug}', 'HomeController@product')->name('product');
Route::get('/products', 'HomeController@listing')->name('products');
Route::get('/search?category={category_slug}', 'HomeController@search')->name('products.category');
Route::get('/search?subcategory={subcategory_slug}', 'HomeController@search')->name('products.subcategory');
Route::get('/search?subsubcategory={subsubcategory_slug}', 'HomeController@search')->name('products.subsubcategory');
Route::get('/search?brand={brand_slug}', 'HomeController@search')->name('products.brand');
Route::post('/product/variant_price', 'HomeController@variant_price')->name('products.variant_price');
Route::get('/shops/visit/{slug}', 'HomeController@shop')->name('shop.visit');
Route::get('/shops/visit/{slug}/{type}', 'HomeController@filter_shop')->name('shop.visit.type');

Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart/nav-cart-items', 'CartController@updateNavCart')->name('cart.nav_cart');
Route::post('/cart/show-cart-modal', 'CartController@showCartModal')->name('cart.showCartModal');
Route::post('/cart/addtocart', 'CartController@addToCart')->name('cart.addToCart');
Route::post('/cart/removeFromCart', 'CartController@removeFromCart')->name('cart.removeFromCart');
Route::post('/cart/updateQuantity', 'CartController@updateQuantity')->name('cart.updateQuantity');

//Checkout Routes
Route::group(['middleware' => ['checkout']], function(){
	Route::get('/checkout', 'CheckoutController@get_shipping_info')->name('checkout.shipping_info');
	Route::any('/checkout/delivery_info', 'CheckoutController@store_shipping_info')->name('checkout.store_shipping_infostore');
	Route::post('/checkout/payment_select', 'CheckoutController@store_delivery_info')->name('checkout.store_delivery_info');
});

Route::get('/checkout/order-confirmed', 'CheckoutController@order_confirmed')->name('order_confirmed');
Route::post('/checkout/payment', 'CheckoutController@checkout')->name('payment.checkout');
Route::post('/get_pick_ip_points', 'HomeController@get_pick_ip_points')->name('shipping_info.get_pick_ip_points');
Route::get('/checkout/payment_select', 'CheckoutController@get_payment_info')->name('checkout.payment_info');
Route::post('/checkout/apply_coupon_code', 'CheckoutController@apply_coupon_code')->name('checkout.apply_coupon_code');
Route::post('/checkout/remove_coupon_code', 'CheckoutController@remove_coupon_code')->name('checkout.remove_coupon_code');

//Paypal START
Route::get('/paypal/payment/done', 'PaypalController@getDone')->name('payment.done');
Route::get('/paypal/payment/cancel', 'PaypalController@getCancel')->name('payment.cancel');
//Paypal END

// SSLCOMMERZ Start
Route::get('/sslcommerz/pay', 'PublicSslCommerzPaymentController@index');
Route::POST('/sslcommerz/success', 'PublicSslCommerzPaymentController@success');
Route::POST('/sslcommerz/fail', 'PublicSslCommerzPaymentController@fail');
Route::POST('/sslcommerz/cancel', 'PublicSslCommerzPaymentController@cancel');
Route::POST('/sslcommerz/ipn', 'PublicSslCommerzPaymentController@ipn');
//SSLCOMMERZ END

//Stipe Start
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
//Stripe END

Route::get('/compare', 'CompareController@index')->name('compare');
Route::get('/compare/reset', 'CompareController@reset')->name('compare.reset');
Route::post('/compare/addToCompare', 'CompareController@addToCompare')->name('compare.addToCompare');

Route::resource('subscribers','SubscriberController');

Route::get('/brands', 'HomeController@all_brands')->name('brands.all');
Route::get('/categories', 'HomeController@all_categories')->name('categories.all');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/search?q={search}', 'HomeController@search')->name('suggestion.search');
Route::post('/ajax-search', 'HomeController@ajax_search')->name('search.ajax');
Route::post('/config_content', 'HomeController@product_content')->name('configs.update_status');

Route::get('/sellerpolicy', 'HomeController@sellerpolicy')->name('sellerpolicy');
Route::get('/returnpolicy', 'HomeController@returnpolicy')->name('returnpolicy');
Route::get('/supportpolicy', 'HomeController@supportpolicy')->name('supportpolicy');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/privacypolicy', 'HomeController@privacypolicy')->name('privacypolicy');

Route::group(['middleware' => ['user', 'verified']], function(){
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
	Route::get('/profile', 'HomeController@profile')->name('profile');
	Route::post('/customer/update-profile', 'HomeController@customer_update_profile')->name('customer.profile.update');
	Route::post('/seller/update-profile', 'HomeController@seller_update_profile')->name('seller.profile.update');

	Route::resource('purchase_history','PurchaseHistoryController');
	Route::post('/purchase_history/details', 'PurchaseHistoryController@purchase_history_details')->name('purchase_history.details');
	Route::get('/purchase_history/destroy/{id}', 'PurchaseHistoryController@destroy')->name('purchase_history.destroy');

	Route::resource('wishlists','WishlistController');
	Route::post('/wishlists/remove', 'WishlistController@remove')->name('wishlists.remove');

	Route::get('/wallet', 'WalletController@index')->name('wallet.index');
	Route::post('/recharge', 'WalletController@recharge')->name('wallet.recharge');

	Route::resource('support_ticket','SupportTicketController');
	Route::post('support_ticket/reply','SupportTicketController@seller_store')->name('support_ticket.seller_store');

	Route::post('/customer_packages/purchase', 'CustomerPackageController@purchase_package')->name('customer_packages.purchase');
	Route::resource('customer_products', 'CustomerProductController');
	Route::post('/customer_products/published', 'CustomerProductController@updatePublished')->name('customer_products.published');
	Route::post('/customer_products/status', 'CustomerProductController@updateStatus')->name('customer_products.update.status');

	Route::get('digital_purchase_history', 'PurchaseHistoryController@digital_index')->name('digital_purchase_history.index');
});

Route::get('/customer_products/destroy/{id}', 'CustomerProductController@destroy')->name('customer_products.destroy');

Route::group(['prefix' =>'seller', 'middleware' => ['seller', 'verified']], function(){
	Route::get('/products', 'HomeController@seller_product_list')->name('seller.products');
	Route::get('/product/get_subcategory_specifications', 'HomeController@get_subcategory_specifications')->name('seller.products.get_subcategory_specifications');

		Route::post('/product/addMenFabricks', 'HomeController@get_men_Fabrics_specifications');
		Route::post('/product/addMenTieSocksCaps', 'HomeController@get_men_Tie_Cap_specifications');
		Route::post('/product/addAccessoriesBackpacks', 'HomeController@get_men_Accessories_Backpacks');
		Route::post('/product/addAccessoriesBelts', 'HomeController@get_men_Accessories_Belts');
		Route::post('/product/addAccessoriesWallet', 'HomeController@get_men_Accessories_Wallets');
		Route::post('/product/addBottomwearCargos', 'HomeController@get_men_Bottomwear_Cargos');
		Route::post('/product/addBottomwearJeans', 'HomeController@get_men_Bottomwear_Jeans');
		Route::post('/product/addBottomwearShorts', 'HomeController@get_men_Bottomwear_Shorts');
		Route::post('/product/addBottomwearTrackPants', 'HomeController@get_men_Bottomwear_TrackPants');
		Route::post('/product/addBottomwearTrousers', 'HomeController@get_men_Bottomwear_Trousers');
		Route::post('/product/addEthnicwearDhotis', 'HomeController@get_men_Ethnicwear_Dhotis');
		Route::post('/product/addEthnicwearSets', 'HomeController@get_men_Ethnicwear_Sets');
		Route::post('/product/addEthnicwearKurtas', 'HomeController@get_men_Ethnicwear_Kurtas');
		Route::post('/product/addFootwearCasualShoes', 'HomeController@get_men_Footwear_CasualShoes');
		Route::post('/product/addFootwearFormalShoes', 'HomeController@get_men_Footwear_FormalShoes');
		Route::post('/product/addFootwearSandals', 'HomeController@get_men_Footwear_Sandals');
		Route::post('/product/addFootwearSleepers', 'HomeController@get_men_Footwear_Sleepers');
		Route::post('/product/addFootwearSportShoes', 'HomeController@get_men_Footwear_SportShoes');
		Route::post('/product/addInnerwearBoxers', 'HomeController@get_men_Innerwear_Boxers');
		Route::post('/product/addInnerwearBriefs', 'HomeController@get_men_Innerwear_Briefs');
		Route::post('/product/addInnerwearNightSuits', 'HomeController@get_men_Innerwear_NightSuits');
		Route::post('/product/addInnerwearPyjamas', 'HomeController@get_men_Innerwear_Pyjamas');
		Route::post('/product/addInnerwearThermals', 'HomeController@get_men_Innerwear_Thermals');
		Route::post('/product/addInnerwearVests', 'HomeController@get_men_Innerwear_Vests');
		Route::post('/product/addMengroomingBodyCare', 'HomeController@get_men_Mengrooming_BodyCare');
		Route::post('/product/addMengroomingCare', 'HomeController@get_men_Mengrooming_Care');
		Route::post('/product/addMengroomingDeodorants', 'HomeController@get_men_Mengrooming_Deodorants');
		Route::post('/product/addMengroomingPerfumes', 'HomeController@get_men_Mengrooming_Perfumes');
		Route::post('/product/addMengroomingSexualsWellness', 'HomeController@get_men_Mengrooming_Wellness');
		Route::post('/product/addMengroomingShave', 'HomeController@get_men_Mengrooming_Shave');
		Route::post('/product/addTopwearShirts', 'HomeController@get_men_Topwear_Shirts');
		Route::post('/product/addTopwearSuits', 'HomeController@get_men_Topwear_Suits');
		Route::post('/product/addTopwearTshirts', 'HomeController@get_men_Topwear_Tshirts');
		Route::post('/product/addWinterwearSweters', 'HomeController@get_men_Winterwear_Sweters');
		Route::post('/product/addWinterwearSwetShirts', 'HomeController@get_men_Winterwear_SwetShirts');
		Route::post('/product/addWinterwearjackets', 'HomeController@get_men_Winterwear_jackets');
		Route::post('/product/addWinterwearTrackSuits', 'HomeController@get_men_Winterwear_TrackSuits');
		Route::post('/product/addJewelleryArtificial','HomeController@get_women_Jewellery_Artificial');
		Route::post('/product/addLingerieBras','HomeController@get_women_Lingerie_Bras');
		Route::post('/product/addLingerieCamisoles','HomeController@get_women_Lingerie_Camisoles');
		Route::post('/product/addLingerieSets','HomeController@get_women_Lingerie_LingerieSets');
		Route::post('/product/addLingerieNightSuits','HomeController@get_women_Lingerie_NightSuits');
		Route::post('/product/addLingeriePanties','HomeController@get_women_Lingerie_Panties');
		Route::post('/product/addLingerieShapewear','HomeController@get_women_Lingerie_Shapewear');
		Route::post('/product/addWatchesAnalog','HomeController@get_women_Watches_Analog');
		Route::post('/product/addWatchesSmart','HomeController@get_women_Watches_Smart');
		Route::post('/product/addAccessoriesHandbags','HomeController@get_women_Accessories_Handbags');
		Route::post('/product/addAccessoriesSunglases','HomeController@get_women_Accessories_Sunglases');
		Route::post('/product/addAccessoriesTraveller','HomeController@get_women_Accessories_Traveller');
		Route::post('/product/addAccessoriesWallets','HomeController@get_women_Accessories_Wallets');
		Route::post('/product/addBeautyGroomingAll','HomeController@get_women_BeautyGrooming_All');
		Route::post('/product/addEthinicwearBlouse','HomeController@get_women_Ethinicwear_Blouse');
		Route::post('/product/addEthinicwearDressMaterial','HomeController@get_women_Ethinicwear_Material');
		Route::post('/product/addEthinicwearDupattas','HomeController@get_women_Ethinicwear_Dupattas');
		Route::post('/product/addEthinicwearGowns','HomeController@get_women_Ethinicwear_Gowns');
		Route::post('/product/addEthinicwearKurtaSets','HomeController@get_women_Ethinicwear_KurtaSets');
		Route::post('/product/addEthinicwearLehanga','HomeController@get_women_Ethinicwear_Lehanga');
		Route::post('/product/addEthinicwearDhotiPants','HomeController@get_women_Ethinicwear_DhotiPants');
		Route::post('/product/addEthinicwearKurtas','HomeController@get_women_Ethinicwear_Kurtas');
		Route::post('/product/addEthinicwearPalazzos','HomeController@get_women_Ethinicwear_Palazzos');
		Route::post('/product/addEthinicwearSalwars','HomeController@get_women_Ethinicwear_Salwars');
		Route::post('/product/addEthinicwearSareeShapewear','HomeController@get_women_Ethinicwear_SareeShapewear');
		Route::post('/product/addEthinicwearSarees','HomeController@get_women_Ethinicwear_Sarees');
		Route::post('/product/addEthinicwearShararas','HomeController@get_women_Ethinicwear_Shararas');
	   Route::post('/product/addEthinicwearPetticoats','HomeController@get_women_Ethinicwear_Petticoats');
		Route::post('/product/addFootwearsBallerinces','HomeController@get_women_Footwear_Ballerinces');
		Route::post('/product/addFootwearsBoots','HomeController@get_women_Footwear_Boots');
		Route::post('/product/addFootwearsCasualShoes','HomeController@get_women_Footwear_CasualShoes');
		Route::post('/product/addFootwearsFlats','HomeController@get_women_Footwear_Flats');
		Route::post('/product/addFootwearsHeels','HomeController@get_women_Footwear_Heels');
		Route::post('/product/addFootwearsSlippers','HomeController@get_women_Footwear_Slippers');
		Route::post('/product/addFootwearsSportShoes','HomeController@get_women_Footwear_SportShoes');
		Route::post('/product/addFootwearsWedges','HomeController@get_women_Footwear_Wedges');
	   Route::post('/product/addPersonalCareEpilators','HomeController@get_women_PersonalCare_Epilators');
	 Route::post('/product/addPersonalCarehairDryers','HomeController@get_women_PersonalCare_hairDryers');
	 Route::post('/product/addPersonalCarehairStarightner','HomeController@get_women_PersonalCare_hairStarightner');
	 Route::post('/product/addWesternwearDresses','HomeController@get_women_Westernwear_Dresses');
	 Route::post('/product/addWesternwearJeans','HomeController@get_women_Westernwear_Jeans');
	 Route::post('/product/addWesternwearLeggings','HomeController@get_women_Westernwear_Leggings');
	 Route::post('/product/addWesternwearSkirts','HomeController@get_women_Westernwear_Skirts');
	 Route::post('/product/addWesternwearTrousers','HomeController@get_women_Westernwear_Trousers');
	 Route::post('/product/addWesternwearTshirts','HomeController@get_women_Westernwear_Tshirts');

	Route::get('/product/upload', 'HomeController@show_product_upload_form')->name('seller.products.upload');
	Route::get('/product/{id}/edit', 'HomeController@show_product_edit_form')->name('seller.products.edit');
	Route::post('/product/product_delete/', 'HomeController@show_product_delete')->name('seller.products.delete');
	Route::post('/product/get_subcategories_by_categoryId/', 'HomeController@get_subcategories_by_categoryId')->name('seller.products.get_subcategories_by_categoryId');
	Route::resource('payments','PaymentController');
	

	Route::get('/shop/apply_for_verification', 'ShopController@verify_form')->name('shop.verify');
	Route::post('/shop/apply_for_verification', 'ShopController@verify_form_store')->name('shop.verify.store');

	Route::get('/reviews', 'ReviewController@seller_reviews')->name('reviews.seller');

	//digital Product
	Route::get('/digitalproducts', 'HomeController@seller_digital_product_list')->name('seller.digitalproducts');
	Route::get('/digitalproducts/upload', 'HomeController@show_digital_product_upload_form')->name('seller.digitalproducts.upload');
	Route::get('/digitalproducts/{id}/edit', 'HomeController@show_digital_product_edit_form')->name('seller.digitalproducts.edit');

    Route::post('/product/addBrand', 'HomeController@addBrand')->name('seller.addBrand');


	Route::view('/welcome','frontend.seller.seller-details.welcome')->name('seller.dashboard');
	Route::view('/store-settings','frontend.seller.seller-details.store-settings')->name('seller.store.setting');
	Route::view('/shipping','frontend.seller.seller-details.shipping')->name('seller.shipping');
	Route::view('/product','frontend.seller.seller-details.product')->name('seller.product');

	Route::view('/test','frontend.seller.test');
	
    Route::get('/payment','Seller\PaymentController@index')->name('seller.payment');
    
	Route::get('/order','Seller\OrderController@index')->name('seller.order');
	Route::post('/order/load-confirm-generate-labels','Seller\OrderController@load_confirm_generate_labels');
	Route::post('/order/change-status','Seller\OrderController@change_status');
	Route::get('/order/download-barcode', 'Seller\OrderController@download_barcode');
	Route::get('/order/download-order-list', 'Seller\OrderController@download_order_list');
	Route::get('/order/download-manifest', 'Seller\OrderController@download_manifest');
});

Route::group(['middleware' => ['auth']], function(){
	Route::post('/products/store/','ProductController@store')->name('products.store');
	Route::post('/products/update/{id}','ProductController@update')->name('products.update');
	Route::get('/products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');
	Route::get('/products/duplicate/{id}', 'ProductController@duplicate')->name('products.duplicate');
	Route::post('/products/sku_combination', 'ProductController@sku_combination')->name('products.sku_combination');
	Route::post('/products/sku_combination_edit', 'ProductController@sku_combination_edit')->name('products.sku_combination_edit');
	
		
	Route::post('/products/featured', 'ProductController@updateFeatured')->name('products.featured');
	Route::post('/products/published', 'ProductController@updatePublished')->name('products.published');
	

	Route::get('invoice/customer/{order_id}', 'InvoiceController@customer_invoice_download')->name('customer.invoice.download');
	Route::get('invoice/seller/{order_id}', 'InvoiceController@seller_invoice_download')->name('seller.invoice.download');

	Route::resource('orders','OrderController');
	Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
	Route::post('/orders/details', 'OrderController@order_details')->name('orders.details');
	Route::post('/orders/update_delivery_status', 'OrderController@update_delivery_status')->name('orders.update_delivery_status');
	Route::post('/orders/update_payment_status', 'OrderController@update_payment_status')->name('orders.update_payment_status');

	Route::resource('/reviews', 'ReviewController');

	Route::resource('/withdraw_requests', 'SellerWithdrawRequestController');
	Route::get('/withdraw_requests_all', 'SellerWithdrawRequestController@request_index')->name('withdraw_requests_all');
	Route::post('/withdraw_request/payment_modal', 'SellerWithdrawRequestController@payment_modal')->name('withdraw_request.payment_modal');
	Route::post('/withdraw_request/message_modal', 'SellerWithdrawRequestController@message_modal')->name('withdraw_request.message_modal');

	Route::resource('conversations','ConversationController');
	Route::post('conversations/refresh','ConversationController@refresh')->name('conversations.refresh');
	Route::resource('messages','MessageController');

	//Product Bulk Upload
	Route::get('/product-bulk-upload/index', 'ProductBulkUploadController@index')->name('product_bulk_upload.index');
	Route::post('/bulk-product-upload', 'ProductBulkUploadController@bulk_upload')->name('bulk_product_upload');
	Route::get('/product-csv-download/{type}', 'ProductBulkUploadController@import_product')->name('product_csv.download');
	Route::get('/vendor-product-csv-download/{id}', 'ProductBulkUploadController@import_vendor_product')->name('import_vendor_product.download');
	Route::group(['prefix' =>'bulk-upload/download'], function(){
		Route::get('/category', 'ProductBulkUploadController@pdf_download_category')->name('pdf.download_category');
		Route::get('/sub_category', 'ProductBulkUploadController@pdf_download_sub_category')->name('pdf.download_sub_category');
		Route::get('/sub_sub_category', 'ProductBulkUploadController@pdf_download_sub_sub_category')->name('pdf.download_sub_sub_category');
		Route::get('/brand', 'ProductBulkUploadController@pdf_download_brand')->name('pdf.download_brand');
		Route::get('/seller', 'ProductBulkUploadController@pdf_download_seller')->name('pdf.download_seller');
	});

	//Product Export
	Route::get('/product-bulk-export', 'ProductBulkUploadController@export')->name('product_bulk_export.index');

	Route::resource('digitalproducts','DigitalProductController');
	Route::get('/digitalproducts/destroy/{id}', 'DigitalProductController@destroy')->name('digitalproducts.destroy');
	Route::get('/digitalproducts/download/{id}', 'DigitalProductController@download')->name('digitalproducts.download');
});

Route::resource('shops', 'ShopController');
Route::get('/track_your_order', 'HomeController@trackOrder')->name('orders.track');

Route::get('/instamojo/payment/pay-success', 'InstamojoController@success')->name('instamojo.success');

Route::post('rozer/payment/pay-success', 'RazorpayController@payment')->name('payment.rozer');

Route::get('/paystack/payment/callback', 'PaystackController@handleGatewayCallback');

Route::get('/vogue-pay', 'VoguePayController@showForm');
Route::get('/vogue-pay/success/{id}', 'VoguePayController@paymentSuccess');
Route::get('/vogue-pay/failure/{id}', 'VoguePayController@paymentFailure');

Route::resource('addresses','AddressController');
Route::get('/addresses/destroy/{id}', 'AddressController@destroy')->name('addresses.destroy');
Route::get('/addresses/set_default/{id}', 'AddressController@set_default')->name('addresses.set_default');

Route::get('/{slug}', 'PageController@show_custom_page')->name('custom-pages.show_custom_page');



