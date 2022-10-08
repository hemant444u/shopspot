<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Auth;
use Hash;
use App\Category;
use App\FlashDeal;
use App\Brand;
use App\SubCategory;
use App\SubSubCategory;
use App\Product;
use App\PickupPoint;
use App\Customer;
use App\CustomerPackage;
use App\CustomerProduct;
use App\User;
use App\Seller;
use App\Shop;
use App\Color;
use App\Order;
use App\OrderDetail;
use App\Ticket;
use App\RefundRequest;
use App\Payment;
use App\BusinessSetting;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Input;
use ImageOptimizer;
use Cookie;
use DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class HomeController extends Controller
{

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('frontend.user_login');
    }

    public function registration(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        if($request->has('referral_code')){
            Cookie::queue('referral_code', $request->referral_code, 43200);
        }
        return view('frontend.user_registration');
    }

// Petticoats  DhotiPants SareeShapewear

    // public function user_login(Request $request)
    // {
    //     $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();
    //     if($user != null){
    //         if(Hash::check($request->password, $user->password)){
    //             if($request->has('remember')){
    //                 auth()->login($user, true);
    //             }
    //             else{
    //                 auth()->login($user, false);
    //             }
    //             return redirect()->route('dashboard');
    //         }
    //     }
    //     return back();
    // }

    public function cart_login(Request $request)
    {
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();
        if($user != null){
            updateCartSetup();
            if(Hash::check($request->password, $user->password)){
                if($request->has('remember')){
                    auth()->login($user, true);
                }
                else{
                    auth()->login($user, false);
                }
            }
        }
        return back();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard()
    {
        $order_reports = [];
        $ticket_reports = [];
        $customer_reports = [];
        $seller_reports = [];
        $revenue_reports = [];
        $sellerType = [];
        $refundReports = [];

        $last24h = Carbon::now()->subDay();
        $last10days = Carbon::now()->subDay(10);
        $products_last24h = Product::where('created_at', '>=',$last24h)->count();

        $seller_reports['new_daily_registered_sellers'] = Seller::where('created_at', '>=', Carbon::today()->toDateString())->count();
        $seller_reports['active_sellers'] = Payment::where('updated_at', '>=',Carbon::now()->subDay(30))->groupBy('seller_id')->count();
        $sellerType['stone'] = OrderDetail::select(DB::raw('count(*) as user_count'),DB::raw('SUM(price) as prices'), 'seller_id')
                            ->where('created_at', '>=',Carbon::now()->subDay(30))->groupBy('seller_id')->havingRaw('prices < ?', [100000.0])
                            ->get()->count();
        $sellerType['gem'] = OrderDetail::select(DB::raw('count(*) as user_count'),DB::raw('SUM(price) as prices'), 'seller_id')
                            ->where('created_at', '>=',Carbon::now()->subDay(30))->groupBy('seller_id')->havingRaw('prices > ?', [1000000.0])
                            ->get()->count();
        $sellerType['jewel'] = OrderDetail::select(DB::raw('count(*) as user_count'),DB::raw('SUM(price) as prices'), 'seller_id')
                            ->where('created_at', '>=',Carbon::now()->subDay(30))->groupBy('seller_id')->havingRaw('prices > ?', [100000.0])
                            ->havingRaw('prices < ?', [1000000.0])->get()->count();


        $customer_reports['new_daily_registered_customers'] = Customer::where('created_at', '>=', Carbon::today()->toDateString())->count();
        $customer_reports['active_customers'] = Order::where('created_at', '>=',Carbon::now()->subDay(30))->groupBy('user_id')->count();

        $refundReports['return_by_customer'] = RefundRequest::where('created_at', '>=', Carbon::now()->subDay(30))->count();
        $refundReports['successful_return'] = RefundRequest::where('created_at', '>=',Carbon::now()->subDay(30))->where('refund_status', 1)->count();

        $ticket_reports['tickets_last24h'] = Ticket::where('created_at', '>=',$last24h)->count();
        $ticket_reports['tickets_active'] = Ticket::where('status', '=','active')->count();
        $ticket_reports['tickets_resolve'] = Ticket::where('status', '=','solved')->count();
        $ticket_reports['tickets_resolve_last24h'] = Ticket::where('status', '=','solved')->where('created_at', '>=',$last24h)->count();
      
        $order_reports['orders_last24h'] = Order::where('created_at', '>=',$last24h)->count();
        $order_reports['active_orders'] = OrderDetail::where('delivery_status', '<>','delivered')->count();
        $order_reports['successful_orders'] = OrderDetail::where('delivery_status', '=','delivered')->count();
        $order_reports['successful_orders_10days_warranty'] = OrderDetail::where('delivery_status', '=','delivered')->where('created_at', '>=','$last10days')->count();
      
        $revenue_reports['total_revenue'] = Order::where('payment_type', '<>', 'cash_on_delivery')->where('payment_status', '=', 'paid')->where('created_at', '>=', Carbon::today()->toDateString())->sum('grand_total');
        $revenue_reports['money_withdrawal'] = Payment::where('created_at', '>=', Carbon::today()->toDateString())->sum('amount');
        $revenue_reports['revenue_generate'] = $revenue_reports['total_revenue'] - $revenue_reports['money_withdrawal'];

        $sellers = OrderDetail::groupBy('seller_id')->get();

        foreach($sellers as $seller) {
        $selling_value = OrderDetail::select(DB::raw('SUM(price) as prices'))->where('created_at', '>=',Carbon::now()->subDay(30))->where('seller_id',$seller->seller_id)->pluck('prices');
        if($selling_value[0] <= 100000){
            $sellerA = Seller::where('user_id', $seller->seller_id)->update(['seller_type' => 'Stone']);
        }
        if($selling_value[0] > 100000 && $selling_value[0] < 1000000 ){
            $sellerA = Seller::where('user_id', $seller->seller_id)->update(['seller_type' => 'Jewel']);
        }
        if( $selling_value[0] >= 1000000 ){
            $sellerA = Seller::where('user_id', $seller->seller_id)->update(['seller_type' => 'Gem']);
        }
    }
        return view('dashboard', compact('products_last24h','seller_reports','ticket_reports','order_reports','customer_reports', 'revenue_reports', 'sellerType','refundReports'));
    }

    /**
     * Show the customer/seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::user()->user_type == 'seller'){
            return view('frontend.seller.dashboard');
        }
        elseif(Auth::user()->user_type == 'customer'){
            return view('frontend.customer.dashboard');
        }
        else {
            abort(404);
        }
    }

    public function profile(Request $request)
    {
        if(Auth::user()->user_type == 'customer'){
            return view('frontend.customer.profile');
        }
        elseif(Auth::user()->user_type == 'seller'){
            return view('frontend.seller.profile');
        }
    }

    public function customer_update_profile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->gender = $request->gender;
        // $user->phone = $request->phone;

        if($request->new_password != null && ($request->new_password == $request->confirm_password)){
            $user->password = Hash::make($request->new_password);
        }

        if($request->hasFile('photo')){
            $user->avatar_original = $request->photo->store('uploads/users');
        }

        if($user->save()){
            flash(__('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }


    public function seller_update_profile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        if($request->new_password != null && ($request->new_password == $request->confirm_password)){
            $user->password = Hash::make($request->new_password);
        }

        if($request->hasFile('photo')){
            $user->avatar_original = $request->photo->store('uploads');
        }

        $seller = $user->seller;
        $seller->cash_on_delivery_status = $request->cash_on_delivery_status;
        $seller->bank_payment_status = $request->bank_payment_status;
        $seller->bank_name = $request->bank_name;
        $seller->bank_acc_name = $request->bank_acc_name;
        $seller->bank_acc_no = $request->bank_acc_no;
        $seller->bank_routing_no = $request->bank_routing_no;

        if($user->save() && $seller->save()){
            flash(__('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }

    /**
     * Show the application frontend home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function flash_deal_details($slug)
    {
        $flash_deal = FlashDeal::where('slug', $slug)->first();
        if($flash_deal != null)
            return view('frontend.flash_deal_details', compact('flash_deal'));
        else {
            abort(404);
        }
    }

    public function load_featured_section(){
        return view('frontend.partials.featured_products_section');
    }

    public function load_best_selling_section(){
        return view('frontend.partials.best_selling_section');
    }

    public function load_home_categories_section(){
        return view('frontend.partials.home_categories_section');
    }

    public function load_best_sellers_section(){
        return view('frontend.partials.best_sellers_section');
    }

    public function trackOrder(Request $request)
    {
        if($request->has('order_code')){
            $order = Order::where('code', $request->order_code)->first();
            if($order != null){
                return view('frontend.track_order', compact('order'));
            }
        }
        return view('frontend.track_order');
    }

    public function product(Request $request, $slug)
    {
        $detailedProduct  = Product::where('slug', $slug)->first();
        //dd($detailedProduct);
        if($detailedProduct!=null && $detailedProduct->published){
            updateCartSetup();
            if($request->has('product_referral_code')){
                Cookie::queue('product_referral_code', $request->product_referral_code, 43200);
                Cookie::queue('referred_product_id', $detailedProduct->id, 43200);
            }
            if($detailedProduct->digital == 1){
                return view('frontend.digital_product_details', compact('detailedProduct'));
            }
            else {
                return view('frontend.product_details', compact('detailedProduct'));
            }
            // return view('frontend.product_details', compact('detailedProduct'));
        }
        abort(404);
    }

    public function shop($slug)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if($shop!=null){
            $seller = Seller::where('user_id', $shop->user_id)->first();
            if ($seller->verification_status != 0){
                return view('frontend.seller_shop', compact('shop'));
            }
            else{
                return view('frontend.seller_shop_without_verification', compact('shop', 'seller'));
            }
        }
        abort(404);
    }

    public function filter_shop($slug, $type)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if($shop!=null && $type != null){
            return view('frontend.seller_shop', compact('shop', 'type'));
        }
        abort(404);
    }

    public function listing(Request $request)
    {
        // $products = filter_products(Product::orderBy('created_at', 'desc'))->paginate(12);
        // return view('frontend.product_listing', compact('products'));
        return $this->search($request);
    }

    public function all_categories(Request $request)
    {
        $categories = Category::all();
        return view('frontend.all_category', compact('categories'));
    }
    public function all_brands(Request $request)
    {
        $categories = Category::all();
        return view('frontend.all_brand', compact('categories'));
    }

    public function show_product_upload_form(Request $request)
    {
        
        if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated){
            if(Auth::user()->seller->remaining_uploads > 0){
                $categories = Category::all();
				
                return view('frontend.seller.product_upload', compact('categories'));
            }
            else {
                flash('Upload limit has been reached. Please upgrade your package.')->warning();
                return back();
            }
        }
		
        $categories = Category::all();
		
        return view('frontend.seller.product_upload', compact('categories'));
    }
   ////////////////////////////////////DB Creation///////////////////////////////// 
  // mandatory_information_jewellery
  //mandatory_information_watches_personalcare
	//Bottom Wear -> fabric fit pattern distress rise theme occasion type usage style

//Foot Wear -> theme occasion heel_height type type_of_shoe 

//Western Wear Top wear -> dress_lenght fabric neck occasion pattern sleeve_lenght sleeve_style suitable_for theme type distress fade fit waist_rise ideal_for leggig_style skirt_lenght collar  closure hooded

//Grooming -> quantity type ideal_for 

//Lingire & Sportwear inner Wear -> back_style coverage fabric ideal_for Padding pattern seam straps Wire_support suitable_for type neck_type robe sleeve_style length occasion usage Sleeve  

//Watches -> dial_color dial_shape features strap_material type compatible_OS display_type ideal_for strap_color usage 
//////////////////////////////////end///////////////////////////
	public function get_women_Westernwear_Tshirts(Request $request)
    {
		$result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
	}
    public function get_women_Westernwear_Trousers(Request $request)
    {
       $result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'fit'=>$request->fit]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
    }
    public function get_women_Westernwear_Skirts(Request $request)
    {
        $result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'skirt_length'=>$request->skirt_length,'fabric'=>$request->fabric,'occasion'=>$request->occasion,'suitable_for'=>$request->suitable_for,'pattern'=>$request->pattern,'type'=>$request->type,'suitable_for'=>$request->suitable_for]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
        
        
    }
    public function get_women_Westernwear_Leggings(Request $request)
    {
		$result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'legging_style'=>$request->legging_style,'fabric'=>$request->fabric,'occasion'=>$request->occasion,'ideal_for'=>$request->ideal_for,'pattern'=>$request->pattern]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
        
    }
    public function get_women_Westernwear_Jeans(Request $request)
    {
       $result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'distress'=>$request->distress,'fade'=>$request->fade,'theme'=>$request->theme,'fabric'=>$request->fabric,'fit'=>$request->fit,'suitable_for'=>$request->suitable_for,'waist_rise'=>$request->waist_rise,'pattern'=>$request->pattern,'suitable_for'=>$request->suitable_for]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
    }
    public function get_women_Westernwear_Dresses(Request $request)
    {
        $result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type,'dress_length'=>$request->dress_length,'theme'=>$request->theme,'fabric'=>$request->fabric,'neck'=>$request->neck,'sleeve_style'=>$request->sleeve_style,'occasion'=>$request->occasion,'pattern'=>$request->pattern,'sleeve_length'=>$request->sleeve_lenght,'suitable_for'=>$request->suitable_for]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
    }
    public function get_women_PersonalCare_hairStarightner(Request $request)
    {
        $result=DB::table('mandatory_information_watches_personalcare')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'plate_coating'=>$request->plate_coating,'coating'=>$request->coating]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
    }
    public function get_women_PersonalCare_hairDryers(Request $request)
    {
      $result=DB::table('mandatory_information_watches_personalcare')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'features'=>$request->features]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
        
    }
    public function get_women_PersonalCare_Epilators(Request $request)
    {
        $result=DB::table('mandatory_information_watches_personalcare')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
        
    }
    public function get_women_Footwear_Wedges(Request $request)
    {
       $result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type,'heel_height'=>$request->heel_height,'theme'=>$request->theme]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
    }
    public function get_women_Footwear_SportShoes(Request $request)
    {
       $result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type,'theme'=>$request->theme]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
    }
    public function get_women_Footwear_Slippers(Request $request)
    {
		$result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type,'theme'=>$request->theme]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
    }
    public function get_women_Footwear_Heels(Request $request)
    { 
        $result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'occasion'=>$request->occasion,'theme'=>$request->theme,'heel_height'=>$request->heel_height]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
    }
    public function get_women_Footwear_Flats(Request $request)
    {
        $result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'occasion'=>$request->occasion,'theme'=>$request->theme]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
        
    }
    public function get_women_Footwear_CasualShoes(Request $request)
    {
        $result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'occasion'=>$request->occasion,'theme'=>$request->theme,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
    }
    public function get_women_Footwear_Ballerinces(Request $request)
    {
        return 1;
        dd($request->all()); 
    //  dd($request->all()); 
        
    }
    public function get_women_Footwear_Boots(Request $request)
    {
         $result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'occasion'=>$request->occasion,'theme'=>$request->theme,'heel_height'=>$request->heel_height]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
        
    }
    public function get_women_Ethinicwear_Petticoats(Request $request)
    {
         $result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
        
    }
	public function get_women_Ethinicwear_DhotiPants(Request $request)
    { 
        $result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 

		
	}public function get_women_Ethinicwear_Shararas(Request $request)
    {
    	 $result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'fabric'=>$request->fabric,'suitable_for'=>$request->suitable_for]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }  
		
	}
	public function get_women_Ethinicwear_Sarees(Request $request)
    {
    	 $result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'saree_style'=>$request->saree_style,'fabric'=>$request->fabric,'saree_type'=>$request->saree_type,'saree_lenght'=>$request->saree_lenght,'blouse_included'=>$request->blouse_included]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Ethinicwear_SareeShapewear(Request $request)
    {
    	$result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
	}
	public function get_women_Ethinicwear_Salwars(Request $request)
    {
    	$result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'occasion'=>$request->occasion,'pattern'=>$request->pattern,'suitable_for'=>$request->suitable_for]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }  
		
	}
	public function get_women_Ethinicwear_Palazzos(Request $request)
    {
    	 $result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'fabric'=>$request->fabric,'suitable_for'=>$request->suitable_for]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
	}
	public function get_women_Ethinicwear_Lehanga(Request $request)
    {
    	 $result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'sleeve'=>$request->sleeve_type,'type'=>$request->type,'fabric'=>$request->fabric,'theme'=>$request->theme,'dupatta_included'=>$request->dupatta_included]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Ethinicwear_Kurtas(Request $request)
    {
        $result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'sleeve_length'=>$request->sleeve_length,'type'=>$request->type,'fabric'=>$request->fabric,'theme'=>$request->theme,'length_type'=>$request->length_type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Ethinicwear_KurtaSets(Request $request)
    {
    	$result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'sleeve_length'=>$request->sleeve_length,'type'=>$request->type,'fabric'=>$request->fabric]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Ethinicwear_Gowns(Request $request)
    {
    	$result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'sleeve_length'=>$request->sleeve_length,'type'=>$request->type,'fabric'=>$request->fabric]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Ethinicwear_Dupattas(Request $request)
    {
         $result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'pattern'=>$request->pattern,'dupptta_length'=>$request->length,'fabric'=>$request->fabric]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Ethinicwear_Material(Request $request)
    {
        $result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type,'pattern'=>$request->pattern,'styling'=>$request->styling,'occasion'=>$request->occasion,'fabric'=>$request->fabric]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Ethinicwear_Blouse(Request $request)
    {
    	$result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type,'pattern'=>$request->pattern,'closure_type'=>$request->closure_type,'neck'=>$request->neck,'occasion'=>$request->occasion,'fabric'=>$request->fabric]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Accessories_Wallets(Request $request)
    {
    	$result=DB::table('mandatory_information_accessories')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'theme'=>$request->theme]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
	}
	public function get_women_BeautyGrooming_All(Request $request)
    {
    	$result=DB::table('mandatory_information_grooming')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'ideal_for'=>$request->ideal_for]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 } 
		
	}
	public function get_women_Accessories_Traveller(Request $request)
    {
    	$result=DB::table('mandatory_information_accessories')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
	} 
	public function get_women_Accessories_Sunglases(Request $request)
    {
		
    	$result=DB::table('mandatory_information_accessories')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'face_shape'=>$request->faceshape,'face_shape'=>$request->faceshape,'frame_material'=>$request->framematerial,'ideal_for'=>$request->idealfor,'lens_color'=>$request->lenscolor,'lens_feature'=>$request->lensfeature,'lens_material'=>$request->lensmaterial,'size'=>$request->size,'style'=>$request->style,'usage'=>$request->usage,'theme'=>$request->theme]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
	}
	public function get_women_Accessories_Handbags(Request $request)
    {
    	
		 $result=DB::table('mandatory_information_accessories')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'material'=>$request->material,'occasion'=>$request->occasion,'theme'=>$request->theme]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
	}
	public function get_women_Watches_Smart(Request $request)
    {
    	$result=DB::table('mandatory_information_watches_personalcare')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'ideal_for'=>$request->ideal_for,'dial_shape'=>$request->dialShape,'features'=>$request->features,'compatible_OS'=>$request->compatible_OS,'display_type'=>$request->display,'strap_material'=>$request->material,'usage'=>$request->usage,'strap_color'=>$request->strapcolor]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
	}
	public function get_women_Watches_Analog(Request $request)
    {
    	$result=DB::table('mandatory_information_watches_personalcare')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'dial_color'=>$request->dial_color,'dial_shape'=>$request->dial_shape,'features'=>$request->features,'strap_material'=>$request->strap_material,'type'=>$request->type]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
	}
	public function get_women_Lingerie_Shapewear(Request $request)
    {
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'type'=>$request->type,'suitable_for'=>$request->suitable_for]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Lingerie_Panties(Request $request)
    {
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'rise'=>$request->rise,'type'=>$request->type,'suitable_for'=>$request->suitable_for]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Lingerie_NightSuits(Request $request)
    {
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'length'=>$request->length,'type'=>$request->type,'occasion'=>$request->occasion,'robe'=>$request->robe,'neck_type'=>$request->neck_type,'sleeve_style'=>$request->sleeve_style,'suitable_for'=>$request->suitable_for]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Lingerie_LingerieSets(Request $request)
    {
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_women_Lingerie_Camisoles(Request $request)
    { 
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'neck_type'=>$request->neck_type,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
	}
	public function get_women_Lingerie_Bras(Request $request)
    {
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'back_style'=>$request->back_style,'coverage'=>$request->coverage,'ideal_for'=>$request->ideal_for,'padding'=>$request->padding,'seam'=>$request->seam,'straps'=>$request->straps,'suitable_for'=>$request->suitable_for,'type'=>$request->type,'wire_support'=>$request->wire_support]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
		
	}
	public function get_women_Jewellery_Artificial(Request $request)
    { 
    	$result=DB::table('mandatory_information_jewellery')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'collection'=>$request->collection,'gemstones'=>$request->gemstones,'ideal_for'=>$request->ideal_for,'material'=>$request->material,'theme'=>$request->theme]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Winterwear_TrackSuits(Request $request)
    {
    	$result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Winterwear_jackets(Request $request)
    {
    	$result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'occasion'=>$request->occasion,'pattern'=>$request->pattern,'sleeves'=>$request->sleeves,'theme'=>$request->theme,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Winterwear_SwetShirts(Request $request)
    {
    	$result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'closure'=>$request->closure,'occasion'=>$request->occasion,'pattern'=>$request->pattern,'sleeves'=>$request->sleeves,'hooded'=>$request->hood,'neck'=>$request->neck]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Winterwear_Sweters(Request $request)
    {
    	$result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'occasion'=>$request->occasion,'pattern'=>$request->pattern,'sleeves'=>$request->sleeves,'closure'=>$request->closure,'neck'=>$request->neck]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
		
	}
	public function get_men_Topwear_Tshirts(Request $request)
    {
    	$result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'sleeves'=>$request->sleeves,'collar'=>$request->collar,'fit'=>$request->fit,'theme'=>$request->theme,'neck'=>$request->neck_type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }  
		
	}
	public function get_men_Topwear_Suits(Request $request)
    { 
    	$result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Topwear_Shirts(Request $request)
    {
    	$result=DB::table('mandatory_information_western_winter_top_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'fit'=>$request->fit,'sleeves'=>$request->sleeves,'theme'=>$request->theme,'collar'=>$request->collar,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Mengrooming_Shave(Request $request)
    {
    	$result=DB::table('mandatory_information_grooming')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'quantity'=>$request->quantity,'type'=>$request->type]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }  
		
	}
	public function get_men_Mengrooming_Wellness(Request $request)
    {
    	$result=DB::table('mandatory_information_grooming')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'quantity'=>$request->quantity,'type'=>$request->type]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 } 
		
	}
	public function get_men_Mengrooming_Perfumes(Request $request)
    {
    	$result=DB::table('mandatory_information_grooming')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'quantity'=>$request->quantity,'type'=>$request->type]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }  
		
	}
	public function get_men_Mengrooming_Deodorants(Request $request)
    {
    	$result=DB::table('mandatory_information_grooming')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'quantity'=>$request->quantity,'type'=>$request->type]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }  
		
	}
	public function get_men_Mengrooming_Care(Request $request)
    {
    	$result=DB::table('mandatory_information_grooming')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'quantity'=>$request->quantity,'type'=>$request->type]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }  
		
	}
	public function get_men_Mengrooming_BodyCare(Request $request)
    {
    	$result=DB::table('mandatory_information_grooming')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'quantity'=>$request->quantity,'type'=>$request->type]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 } 
		
	}
	public function get_men_Innerwear_Vests(Request $request)
    { 
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'sleeve'=>$request->sleeves,'type'=>$request->type,'pattern'=>$request->pattern]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
	}
	public function get_men_Innerwear_Thermals(Request $request)
    {
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'sleeve'=>$request->sleeves,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Innerwear_Pyjamas(Request $request)
    {
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'theme'=>$request->theme,'usage'=>$request->usage]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Innerwear_NightSuits(Request $request)
    {
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Innerwear_Briefs(Request $request)
    {
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'type'=>$request->type,'pattern'=>$request->pattern]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Innerwear_Boxers(Request $request)
    {
    	$result=DB::table('mandatory_information_lingire_sportwear_inner_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'occasion'=>$request->occasion,'pattern'=>$request->pattern]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
		
	}
	public function get_men_Footwear_SportShoes(Request $request)
    {
    	$result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type_of_shoe'=>$request->shoes_type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
		
	}
	public function get_men_Footwear_Sleepers(Request $request)
    {
    	$result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'occasion'=>$request->occasion]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }  
		 
		
	}
	public function get_men_Footwear_Sandals(Request $request)
    { 
    	$result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }  
		
	}
	public function get_men_Footwear_FormalShoes(Request $request)
    {
    	$result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Footwear_CasualShoes(Request $request)
    {
    	$result=DB::table('mandatory_information_foot_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'occasion'=>$request->occasion,'type_of_shoe'=>$request->shoes_type,'theme'=>$request->theme]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Ethnicwear_Kurtas(Request $request)
    {
    	$result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type,'pattern'=>$request->pattern,'length_type'=>$request->length,'shape_type'=>$request->shape_type,'occasion'=>$request->occasion,'fabric'=>$request->fabric]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         }
		
	}
	public function get_men_Ethnicwear_Sets(Request $request)
    {
    	$result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type,'pattern'=>$request->pattern,'bottom_type'=>$request->bottom,'sleeve'=>$request->sleeve,'top_type'=>$request->top_type,'fabric'=>$request->fabric]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Ethnicwear_Dhotis(Request $request)
    {
    	$result=DB::table('mandatory_information_ethnic_wear')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type,'pattern'=>$request->pattern,'fabric'=>$request->fabric]); 
         if($result){
             return 1;
         }
         else{
              return 0;
         } 
		
	}
	public function get_men_Bottomwear_Trousers(Request $request)
    {
    	$result=DB::table('mandatory_information_bottomwear_fabrics')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'fit'=>$request->fit,'occasion'=>$request->occasion,'pattern'=>$request->pattern,'theme'=>$request->theme,'style'=>$request->style,'type'=>$request->type]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
	}
	public function get_men_Bottomwear_TrackPants(Request $request)
    {
    	$result=DB::table('mandatory_information_bottomwear_fabrics')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'usage'=>$request->usage,'pattern'=>$request->pattern,'theme'=>$request->theme]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
	}
	public function get_men_Bottomwear_Shorts(Request $request)
    {
    	$result=DB::table('mandatory_information_bottomwear_fabrics')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'fit'=>$request->fit,'pattern'=>$request->pattern,'occasion'=>$request->occasion,'type'=>$request->type,'theme'=>$request->theme]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
	}
	public function get_men_Bottomwear_Jeans(Request $request)
    {
    	$result=DB::table('mandatory_information_bottomwear_fabrics')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'fit'=>$request->fit,'pattern'=>$request->pattern,'rise'=>$request->rise,'theme'=>$request->theme]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }  
	}
	public function get_men_Bottomwear_Cargos(Request $request)
    {
    	$result=DB::table('mandatory_information_bottomwear_fabrics')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'fabric'=>$request->fabric,'fit'=>$request->fit,'pattern'=>$request->pattern]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }  
		
	}
	public function get_men_Accessories_Wallets(Request $request)
    { 
    	$result=DB::table('mandatory_information_accessories')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'type'=>$request->type,'material'=>$request->material,'ideal_for'=>$request->idealfor]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 } 
		
	}
	public function get_men_Accessories_Belts(Request $request)
    {
    	$result=DB::table('mandatory_information_accessories')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'occasion'=>$request->occasion,'material'=>$request->material,'size_in_inches'=>$request->inches]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
	}
	public function get_men_Accessories_Backpacks(Request $request)
    {   	
		$result=DB::table('mandatory_information_accessories')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'sub_sub_cat_id' => $request->SubSubCatId,'bag_size'=>$request->bagsize,'material'=>$request->material,'features'=>$request->features,'no_of_compartment'=>$request->compartment]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
		
	}
	public function get_men_Fabrics_specifications(Request $request)
    {
    	$result=DB::table('mandatory_information_bottomwear_fabrics')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'fabric'=>$request->fabric,'pattern'=>$request->pattern,'type'=>$request->type]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 }
		
	}
	public function get_men_Tie_Cap_specifications(Request $request)
    {
    	$result=DB::table('mandatory_information_bottomwear_fabrics')->insert(['cat_id' => $request->CatId,'sub_cat_id' => $request->SubCatId,'fabric'=>$request->fabric,'clothing'=>$request->clothing]); 
		 if($result){
			 return 1;
		 }
		 else{
			  return 0;
		 } 
		
	}
    public function get_subcategory_specifications(Request $request)
    {
       
		$category_id=$request->category_id;
		$subcategory_id=$request->subcategory_id;
		$subsubcategory_id=$request->subsubcategory_id;
		$subcategory_name=$request->subcategory_name;
        //  dd($subcategory_name);
	//dd($request->all());  
	//dd($request->all());  
		//$sub_subcategory_name=htmlspecialchars($request->sub_subcategory_name);
        $sub_subcategory_name=$request->sub_subcategory_name;
       // dd($sub_subcategory_name);
        $category_name=$request->category_name;
		$data= array();
        if($category_name=="Women" && $subcategory_name=="Personal Care Appliances" && $sub_subcategory_name=="Epilators")
        {
             $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			return view('frontend.seller.women_personal_care_appliances_Epilators', compact('result'));
	      
        }
		if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Petticoats")
        {
				$result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			return view('frontend.seller.women_ethnic_wear_Petticoats', compact('result'));
	      
        }
		if($category_name=="Women" && $subcategory_name=="Personal Care Appliances" && $sub_subcategory_name=="Hair Dryers")
        {
              $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			return view('frontend.seller.women_personal_care_appliances_HairDryers', compact('result'));
	      
        }
		if($category_name=="Women" && $subcategory_name=="Personal Care Appliances" && $sub_subcategory_name=="Hair Straightners") 
        {
            $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.women_personal_care_appliances_HairStarightner', compact('result'));
	      
        }
		if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Dhoti Pants")
        {
			
			$result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			return view('frontend.seller.women_ethnic_wear_Dhoti_Pants', compact('result'));
	      
        }
		if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Saree Shapewear")
        {
			
			$result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			return view('frontend.seller.women_ethnic_wear_Saree_Shapewear', compact('result'));
	      
        }
		if($category_name=="Women" && $subcategory_name=="Jewellery" && $sub_subcategory_name=="Artificial Jewellery")
        {
        	$result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			return view('frontend.seller.women_Jewellery_ArtificialJewellery', compact('result'));
	      
        }
		if($category_name=="Men" && $subcategory_name=="Winter wear" && $sub_subcategory_name=="Track suits")
        {

            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_winterwear_Tracksuits', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Winter wear" && $sub_subcategory_name=="Sweatshirts")
        {

            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_winterwear_Sweatshirts', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Winter wear" && $sub_subcategory_name=="Sweaters")
        {

            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_winterwear_Sweaters', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Winter wear" && $sub_subcategory_name=="Jackets")
        {

            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_winterwear_Jackets', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Top wear" && $sub_subcategory_name=="Shirts")
        {

            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_topwear_Shirts', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Top wear" && $sub_subcategory_name=="T-Shirts")
        {

            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_topwear_TShirts', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Top wear" && $sub_subcategory_name=="Suits")
        {

            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_topwear_Suits', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Men's Grooming" && $sub_subcategory_name=="Body and Face care")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_mengrooming_BodyFacecare', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Men's Grooming" && $sub_subcategory_name=="Care")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_mengrooming_Care', compact('result'));
	      
        }
         if($category_name=="Men" && $subcategory_name=="Men's Grooming" && $sub_subcategory_name=="Deodorants")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_mengrooming_Deodorants', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Men's Grooming" && $sub_subcategory_name=="Perfume")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_mengrooming_Perfume', compact('result'));
	      
        }
         if($category_name=="Men" && $subcategory_name=="Men's Grooming" && $sub_subcategory_name=="Sexual Wellness")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_mengrooming_SexualWellness', compact('result'));
	      
        }
         if($category_name=="Men" && $subcategory_name=="Men's Grooming" && $sub_subcategory_name=="Shave")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_mengrooming_Shave', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Fabrics" || $subcategory_name=="Fabric")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_Fabrics', compact('result'));
	      
        }
		if($category_name=="Men" && $subcategory_name=="Tie ,Socks , Caps" || $subcategory_name=="Tie,Socks,Caps")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_TieSocksCaps', compact('result'));
	      
        }
		if($category_name=="Men" && $subcategory_name=="Innerwear" && $sub_subcategory_name=="Boxers")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_innerwear_Boxers', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Innerwear" && $sub_subcategory_name=="Briefs")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_innerwear_Briefs', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Innerwear" && $sub_subcategory_name=="Night Suits")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_innerwear_NightSuits', compact('result'));
	      
        }
         if($category_name=="Men" && $subcategory_name=="Innerwear" && $sub_subcategory_name=="Pyjama")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_innerwear_Pyjama', compact('result'));
	      
        }
         if($category_name=="Men" && $subcategory_name=="Innerwear" && $sub_subcategory_name=="Thermals")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_innerwear_Thermals', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Innerwear" && $sub_subcategory_name=="Vests")
        {

            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_innerwear_Vests', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Bottom wear" && $sub_subcategory_name=="Trousers")
        {
			
            $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_bottomwear_Trousers', compact('result'));
	      
        }
        if($category_name=="Men" && $subcategory_name=="Fabric" || $subcategory_name=="Fabrics")
        {
			;
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			dd($result);
			return view('frontend.seller.men_bottomwear_Trousers', compact('result'));
	      
        }
		if($category_name=="Men" && $subcategory_name=="Bottom wear" && $sub_subcategory_name=="Track pants")
        {
			
            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_bottomwear_Trackpants', compact('result'));
	      
        }
		if($category_name=="Men" && $subcategory_name=="Bottom wear" && $sub_subcategory_name=="Jeans")
        {
			
            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_bottomwear_Jeans', compact('result'));
	      
        }
		if($category_name=="Men" && $subcategory_name=="Bottom wear" && $sub_subcategory_name=="Shorts")
        {
			
            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			return view('frontend.seller.men_bottomwear_Shorts', compact('result'));
	      
        }
		if($category_name=="Men" && $subcategory_name=="Bottom wear" && $sub_subcategory_name=="Cargos")
        {
			
            $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
	
			return view('frontend.seller.men_bottomwear_Cargos', compact('result'));
	      
        }
		if(($category_name=="Men"|| $category_name=="Women") && $subcategory_name=="Accessories" && $sub_subcategory_name=="Wallets")
        {
			if($category_name=="Men"){
            $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();			
			return view('frontend.seller.men_accessories_wallets', compact('result'));
			}
			else{
				 $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
				return view('frontend.seller.women_accessories_wallets', compact('result'));
			}
	      
        }
        if($category_name=="Men" && $subcategory_name=="Accessories" && $sub_subcategory_name=="Belts")
        {
			
            $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();	
		return view('frontend.seller.men_accessories_Belts', compact('result'));			
	      /*  if($result)
				{
					 $data= array('res' => $result,	'type' => 'Belts',    	'status'=>'200');
					 return view('frontend.seller.product_madatory_information', compact('data'));
					
				}
				else
				{
					 $data= array('res' => $result,	'type' => 'Belts',	'status'=>'500');
					 return view('frontend.seller.product_madatory_information', compact('data'));
				}  */
        }
        if($category_name=="Men" && $subcategory_name=="Accessories" && $sub_subcategory_name=="Backpacks")
        {
		
			
            $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
	       return view('frontend.seller.men_accessories_Backpacks', compact('result'));	
        }
       if($category_name=="Women" && $subcategory_name=="Western Wear" && $sub_subcategory_name=="Trousers")
        {
			$categories=DB::table('categories')->get();
            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();	 
	       return view('frontend.seller.women_western_wear_Trousers', compact('result','category_name','subcategory_name','sub_subcategory_name','categories'));
        }
       if($category_name=="Women" && $subcategory_name=="Western Wear" && $sub_subcategory_name=="Jeans")
        {

            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();	 
	       
		   return view('frontend.seller.women_western_wear_Jeans', compact('result'));
        }
       if($category_name=="Women" && $subcategory_name=="Western Wear" && $sub_subcategory_name=="Skirts")
        {

            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();	 
	      
		   return view('frontend.seller.women_western_wear_Skirts', compact('result'));
        }
        if($category_name=="Women" && $subcategory_name=="Western Wear" && $sub_subcategory_name=="Leggings")
        {
			
            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();	 
	       
		    return view('frontend.seller.women_western_wear_Leggings', compact('result'));
        }
        if($category_name=="Women" && $subcategory_name=="Western Wear" && $sub_subcategory_name=="Dresses")
        {

            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();	 
	       
		  return view('frontend.seller.women_western_wear_Dresses', compact('result'));
        }
        if($category_name=="Women" && $subcategory_name=="Western Wear" && $sub_subcategory_name=="Top, T-Shirts")
        {

            $result = DB::table('sub_subcatagories_western_wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();				
	       return view('frontend.seller.women_western_wear_Tshirts', compact('result')); 
        }
        if($category_name=="Women" && $subcategory_name=="Accessories" && $sub_subcategory_name=="Handbags")
        {

            $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
			
			 return view('frontend.seller.women_accessories_Handbags', compact('result'));
	      
        }
        if(($category_name=="Women" || $category_name=="Men") && $subcategory_name=="Accessories" && ($sub_subcategory_name=="Traveller" || $sub_subcategory_name=="Luggage"))
        {

            $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
            return view('frontend.seller.women_accessories_Traveller', compact('result')); 
        }
        if(($category_name=="Women" || $category_name=="Men")&& $subcategory_name=="Accessories" && $sub_subcategory_name=="Sunglasses")
        {

            $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
         return view('frontend.seller.women_accessories_Sunglasses', compact('result'));
        }
        if($category_name=="Women" && ($subcategory_name=="Beauty & Grooming"||$subcategory_name=="Beauty" )&& ($sub_subcategory_name=="Bath" || $sub_subcategory_name=="Deodorants" || $sub_subcategory_name=="Hair Care" || $sub_subcategory_name=="Make Up"|| $sub_subcategory_name=="Skin Care"))
        {
                $result = DB::table('sub_subcatagories_Accessories_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();
          // dd($result);
               return view('frontend.seller.women_beauty_grooming_all', compact('result'));
        }
	    if($category_name=="Men" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Kurta")
        {
			
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get(); 
	
          return view('frontend.seller.men_ethinic_wear_Kurta', compact('result'));			

        }
		if($category_name=="Men" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Dhoti")
        {
			
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get(); 
		
          return view('frontend.seller.men_ethinic_wear_Dhoti', compact('result'));		

        }
		if($category_name=="Men" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Ethnic Sets")
        {
			
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get(); 
		
          return view('frontend.seller.men_ethinic_wear_EthnicSets', compact('result'));			

        }
		if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Lehenga Choli")
        {
			
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get(); 
		
          return view('frontend.seller.women_ethinic_wear_Lehenga', compact('result'));			

        }
       if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Blouse")
        {
			
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
          
          return view('frontend.seller.women_ethinic_wear_Blouse', compact('result'));
        } 
       if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Dress Material")
        {
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
        
           return view('frontend.seller.women_ethinic_wear_Dress_Material', compact('result'));
        }
        if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Dupattas")
        {

            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           return view('frontend.seller.women_ethinic_wear_Dupattas', compact('result')); 
        } 
       if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Gowns")
       {

            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
          
           return view('frontend.seller.women_ethinic_wear_Gowns', compact('result')); 
        }
       if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Kurta Set")
        {

            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
			
           return view('frontend.seller.women_ethinic_wear_KurtaSets', compact('result')); 
				
        }
       if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Palazzos")
        {

            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
            return view('frontend.seller.women_ethinic_wear_Palazzos', compact('result')); 
        }
       if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Kurtas")
       {
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
			
           return view('frontend.seller.women_ethinic_wear_Kurtas', compact('result')); 
        }
       if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Salwars")
       {
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();  
			return view('frontend.seller.women_ethinic_wear_Salwars', compact('result')); 			
          
        }
       if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Sarees")
       {
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
            
				return view('frontend.seller.women_ethnic_wear_Sarees', compact('result'));
        }
       if($category_name=="Women" && $subcategory_name=="Ethnic Wear" && $sub_subcategory_name=="Shararas")
       {
            $result = DB::table('sub_subcatagories_Ethinic_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
            return view('frontend.seller.women_ethnic_wear_Shararas', compact('result'));
        }
		if($category_name=="Men"&& ($subcategory_name=="Foot Wear" || $subcategory_name=="Footwear") && $sub_subcategory_name=="Flip- Flops" || $sub_subcategory_name=="Flip-Flops" )
        {
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
          
           return view('frontend.seller.men_foot_wear_Sleepers', compact('result'));
        }
        if($category_name=="Men"&& ($subcategory_name=="Foot Wear" || $subcategory_name=="Footwear") && $sub_subcategory_name=="Sandals")
        {
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
          
           return view('frontend.seller.men_foot_wear_Sandals', compact('result'));
        }
        if($category_name=="Men"&& ($subcategory_name=="Foot Wear" || $subcategory_name=="Footwear") && $sub_subcategory_name=="Formal Shoes")
        {
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
          
           return view('frontend.seller.men_foot_wear_FormalShoes', compact('result'));
        }
        if(($category_name=="Women" || $category_name=="Men")&& ($subcategory_name=="Foot Wear" || $subcategory_name=="Footwear") && $sub_subcategory_name=="Sports Shoes")
        {
        	if($category_name=="Women"){
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
           return view('frontend.seller.women_foot_wear_SportsShoes', compact('result'));
       }else{
       	$result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
           return view('frontend.seller.men_foot_wear_SportsShoes', compact('result'));
       }
        }
       if(($category_name=="Women" || $category_name=="Men" )&& ($subcategory_name=="Foot Wear" ||   
       	$subcategory_name=="Footwear" )&& $sub_subcategory_name=="Casual Shoes")
       {
        if($category_name=="Women"){
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
          
            return view('frontend.seller.women_foot_wear_CasualShoes', compact('result')); 
        }else{
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
          
            return view('frontend.seller.men_foot_wear_CasualShoes', compact('result'));
        }
        }
       if($category_name=="Women" && $subcategory_name=="Foot Wear" && $sub_subcategory_name=="Boots")
       {
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
          return view('frontend.seller.women_foot_wear_Boots', compact('result'));  
        }
       if($category_name=="Women" && $subcategory_name=="Foot Wear" && $sub_subcategory_name=="Flats")
       {
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
           return view('frontend.seller.women_foot_wear_Flats', compact('result'));
        }
       if($category_name=="Women" && $subcategory_name=="Foot Wear" && $sub_subcategory_name=="Heels")
       {
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
           return view('frontend.seller.women_foot_wear_Heels', compact('result'));
        }
	    if($category_name=="Women" && $subcategory_name=="Foot Wear" && $sub_subcategory_name=="Wedges")
        {
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
          
           return view('frontend.seller.women_foot_wear_Wedges', compact('result'));
        }
       if($category_name=="Women" && $subcategory_name=="Foot Wear" && $sub_subcategory_name=="Slippers")
       {
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           return view('frontend.seller.women_foot_wear_Slippers', compact('result'));
        } 
       if($category_name=="Women" && $subcategory_name=="Foot Wear" && $sub_subcategory_name=="Ballerines")
        {
            $result = DB::table('sub_subcatagories_Foot_Wear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
           return view('frontend.seller.women_foot_wear_Ballerines', compact('result')); 
        }
        if(($category_name=="Women" || $category_name=="Men") && $subcategory_name=="Watches" && $sub_subcategory_name=="Analog Watch")
        {
        	
            $result = DB::table('sub_subcatagories_Watches_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get(); 
			
				return view('frontend.seller.women_Watches_AnalogWatch', compact('result')); 
        }
        if(($category_name=="Women" || $category_name=="Men") && $subcategory_name=="Watches" && $sub_subcategory_name=="Smart Watch")
        {
            $result = DB::table('sub_subcatagories_Watches_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
				return view('frontend.seller.women_Watches_SmartWatch', compact('result'));  
        }
	    if($category_name=="Women" && $subcategory_name=="Lingerie" && $sub_subcategory_name=="Bras")
        {
            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
          
          return view('frontend.seller.women_Lingerie_Sportwear_Bras', compact('result')); 
        }
        if($category_name=="Women" && $subcategory_name=="Lingerie" && $sub_subcategory_name=="Camisoles")
        {
            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
           return view('frontend.seller.women_Lingerie_Sportwear_Camisoles', compact('result'));
        }
        if($category_name=="Women" && $subcategory_name=="Lingerie" && $sub_subcategory_name=="Lingerie Sets")
        {
            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
           return view('frontend.seller.women_Lingerie_Sportwear_LingerieSets', compact('result'));
        }
        if($category_name=="Women" && $subcategory_name=="Lingerie" && $sub_subcategory_name=="Nightsuits")
        {
            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
            return view('frontend.seller.women_Lingerie_Sportwear_Nightsuits', compact('result'));
        }
        if($category_name=="Women" && $subcategory_name=="Lingerie" && $sub_subcategory_name=="Panties")
        {
            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
            return view('frontend.seller.women_Lingerie_Sportwear_Panties', compact('result'));
        }
        if($category_name=="Women" && $subcategory_name=="Lingerie" && $sub_subcategory_name=="Shapewear")
        {
            $result = DB::table('sub_subcatagories_lingire_sportwear_specifications')->where('cat_id',$category_id)->where('subcat_id',$subcategory_id)->where('sub_subcat_id',$subsubcategory_id)->get();   
           
           return view('frontend.seller.women_Lingerie_Sportwear_Shapewear', compact('result'));
        }
    }

    public function show_product_edit_form(Request $request, $id)
    {
        $categories = Category::all();
        $product = Product::find(decrypt($id));
        return view('frontend.seller.product_edit', compact('categories', 'product'));
    }
    
    public function show_product_delete(Request $request)
    {
     
       
       return $product_delete = DB::table('products')->where('id',$request->id)->delete();
       
    }

     public function get_subcategories_by_categoryId(Request $request)
    {
        $category_id=$request->category_id;
        
       $result = DB::table('sub_categories')->select('id','name')->where('category_id',$category_id)->orderBy('created_at', 'desc')->get();
       return json_encode($result);  
    
     
    }
    public function seller_product_list(Request $request)
    {
        $search = null;
        
    //    $products = Product::join('ProductStock', 'Product.id', '=', 'ProductStock.product_id')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc');
     $product_colors = DB::table('products As p')->select('p.colors')
            ->Join('product_stocks As ps', 'p.id', '=', 'ps.product_id')
            ->Join('categories As c', 'p.category_id', '=', 'c.id')
            ->Join('brands As b', 'p.brand_id', '=', 'b.id')
            ->where('p.user_id', Auth::user()->id)->orderBy('p.created_at', 'desc')->get();
            
         $all_colors = array();
  //$non_paginate_products = Product::where('published', 1)->where('tags', 'like', '%'.$request->search.'%')->get();
        foreach ($product_colors as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if(!in_array($color, $all_colors)){
                        array_push($all_colors, $color);
                    }
                }
            }
        }
        
        $products = DB::table('products As p')
            ->Join('product_stocks As ps', 'p.id', '=', 'ps.product_id')
            ->Join('categories As c', 'p.category_id', '=', 'c.id')
            ->Join('brands As b', 'p.brand_id', '=', 'b.id')
            ->where('p.user_id', Auth::user()->id)->orderBy('p.created_at', 'desc')
            ->paginate(10);
        
   
   //  $count=count($products->colors);
       
        if ($request->has('search')) {
            $search = $request->search;
            $products = $products->where('name', 'like', '%'.$search.'%');
        }
      //  $products = $products->paginate(10);
        return view('frontend.seller.products', compact('products', 'search','all_colors'));
    }

    public function ajax_search(Request $request)
    {
        $keywords = array();
        $products = Product::where('published', 1)->where('tags', 'like', '%'.$request->search.'%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',',$product->tags) as $key => $tag) {
                if(stripos($tag, $request->search) !== false){
                    if(sizeof($keywords) > 5){
                        break;
                    }
                    else{
                        if(!in_array(strtolower($tag), $keywords)){
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }

        $products = filter_products(Product::where('published', 1)->where('name', 'like', '%'.$request->search.'%'))->get()->take(3);

        $subsubcategories = SubSubCategory::where('name', 'like', '%'.$request->search.'%')->get()->take(3);

        $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%'.$request->search.'%')->get()->take(3);

        if(sizeof($keywords)>0 || sizeof($subsubcategories)>0 || sizeof($products)>0 || sizeof($shops) >0){
            return view('frontend.partials.search_content', compact('products', 'subsubcategories', 'keywords', 'shops'));
        }
        return '0';
    }
    public function addBrand(Request $request)
    {
      
		$brand = new Brand;
		$brand->b_name = $request->brand;
		$brand->meta_title = $request->tittle;
		$brand->meta_description = $request->brand_description;
	    $brand->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->brand)).'-'.str_random(5);
		if($request->hasFile('brand_logo')){
            $brand->logo = $request->brand_logo->store('uploads/brands');
           
            $brand->save();
            echo 1;
        }
        else{
            echo 0;
        }
        
    }
    public function search(Request $request)
    {
        $query = $request->q;
        $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
        $sort_by = $request->sort_by;
        $category_id = (Category::where('slug', $request->category)->first() != null) ? Category::where('slug', $request->category)->first()->id : null;
        $subcategory_id = (SubCategory::where('slug', $request->subcategory)->first() != null) ? SubCategory::where('slug', $request->subcategory)->first()->id : null;
        $subsubcategory_id = (SubSubCategory::where('slug', $request->subsubcategory)->first() != null) ? SubSubCategory::where('slug', $request->subsubcategory)->first()->id : null;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;

        $conditions = ['published' => 1];

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }
        if($category_id != null){
            $conditions = array_merge($conditions, ['category_id' => $category_id]);
        }
        if($subcategory_id != null){
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory_id]);
        }
        if($subsubcategory_id != null){
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory_id]);
        }
        if($seller_id != null){
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        $products = Product::where($conditions);

        if($min_price != null && $max_price != null){
            $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%'.$query.'%')->orWhere('tags', 'like', '%'.$query.'%');
        }

        if($sort_by != null){
            switch ($sort_by) {
                case '1':
                    $products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }


        $non_paginate_products = filter_products($products)->get();

        //Attribute Filter

        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if($product->attributes != null && is_array(json_decode($product->attributes))){
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if($attribute['id'] == $value){
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if(!$flag){
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if($choice_option->attribute_id == $value){
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    }
                    else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if($choice_option->attribute_id == $value){
                                foreach ($choice_option->values as $key => $value) {
                                    if(!in_array($value, $attributes[$pos]['values'])){
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $selected_attributes = array();

        foreach ($attributes as $key => $attribute) {
            if($request->has('attribute_'.$attribute['id'])){
                foreach ($request['attribute_'.$attribute['id']] as $key => $value) {
                    $str = '"'.$value.'"';
                    $products = $products->where('choice_options', 'like', '%'.$str.'%');
                }

                $item['id'] = $attribute['id'];
                $item['values'] = $request['attribute_'.$attribute['id']];
                array_push($selected_attributes, $item);
            }
        }


        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if(!in_array($color, $all_colors)){
                        array_push($all_colors, $color);
                    }
                }
            }
        }

        $selected_color = null;

        if($request->has('color')){
            $str = '"'.$request->color.'"';
            $products = $products->where('colors', 'like', '%'.$str.'%');
            $selected_color = $request->color;
        }


        $products = filter_products($products)->paginate(12)->appends(request()->query());

        return view('frontend.product_listing', compact('products', 'query', 'category_id', 'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by', 'seller_id','min_price', 'max_price', 'attributes', 'selected_attributes', 'all_colors', 'selected_color'));
    }

    public function product_content(Request $request){
        $connector  = $request->connector;
        $selector   = $request->selector;
        $select     = $request->select;
        $type       = $request->type;
        productDescCache($connector,$selector,$select,$type);
    }

    public function home_settings(Request $request)
    {
        return view('home_settings.index');
    }

    public function top_10_settings(Request $request)
    {
        foreach (Category::all() as $key => $category) {
            if(in_array($category->id, $request->top_categories)){
                $category->top = 1;
                $category->save();
            }
            else{
                $category->top = 0;
                $category->save();
            }
        }

        foreach (Brand::all() as $key => $brand) {
            if(in_array($brand->id, $request->top_brands)){
                $brand->top = 1;
                $brand->save();
            }
            else{
                $brand->top = 0;
                $brand->save();
            }
        }

        flash(__('Top 10 categories and brands have been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }

    public function variant_price(Request $request)
    {
        $product = Product::find($request->id);
        $str = '';
        $quantity = 0;

        if($request->has('color')){
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        if(json_decode(Product::find($request->id)->choice_options) != null){
            foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                if($str != null){
                    $str .= '-'.str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
                else{
                    $str .= str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                }
            }
        }



        if($str != null && $product->variant_product){
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $quantity = $product_stock->qty;
        }
        else{
            $price = $product->unit_price;
            $quantity = $product->current_stock;
        }

        //discount calculation
        $flash_deals = \App\FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $key => $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
                $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                if($flash_deal_product->discount_type == 'percent'){
                    $price -= ($price*$flash_deal_product->discount)/100;
                }
                elseif($flash_deal_product->discount_type == 'amount'){
                    $price -= $flash_deal_product->discount;
                }
                $inFlashDeal = true;
                break;
            }
        }
        if (!$inFlashDeal) {
            if($product->discount_type == 'percent'){
                $price -= ($price*$product->discount)/100;
            }
            elseif($product->discount_type == 'amount'){
                $price -= $product->discount;
            }
        }

        if($product->tax_type == 'percent'){
            $price += ($price*$product->tax)/100;
        }
        elseif($product->tax_type == 'amount'){
            $price += $product->tax;
        }
        return array('price' => single_price($price*$request->quantity), 'quantity' => $quantity, 'digital' => $product->digital);
    }

    public function sellerpolicy(){
        return view("frontend.policies.sellerpolicy");
    }

    public function returnpolicy(){
        return view("frontend.policies.returnpolicy");
    }

    public function supportpolicy(){
        return view("frontend.policies.supportpolicy");
    }

    public function terms(){
        return view("frontend.policies.terms");
    }

    public function privacypolicy(){
        return view("frontend.policies.privacypolicy");
    }

    public function get_pick_ip_points(Request $request)
    {
        $pick_up_points = PickupPoint::all();
        return view('frontend.partials.pick_up_points', compact('pick_up_points'));
    }

    public function get_category_items(Request $request){
        $category = Category::findOrFail($request->id);
        return view('frontend.partials.category_elements', compact('category'));
    }

    public function premium_package_index()
    {
        $customer_packages = CustomerPackage::all();
        return view('frontend.customer_packages_lists', compact('customer_packages'));
    }

    public function seller_digital_product_list(Request $request)
    {
        $products = Product::where('user_id', Auth::user()->id)->where('digital', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.seller.digitalproducts.products', compact('products'));
    }
    public function show_digital_product_upload_form(Request $request)
    {
        if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated){
            if(Auth::user()->seller->remaining_digital_uploads > 0){
                $business_settings = BusinessSetting::where('type', 'digital_product_upload')->first();
                $categories = Category::where('digital', 1)->get();
                return view('frontend.seller.digitalproducts.product_upload', compact('categories'));
            }
            else {
                flash('Upload limit has been reached. Please upgrade your package.')->warning();
                return back();
            }
        }

        $business_settings = BusinessSetting::where('type', 'digital_product_upload')->first();
        $categories = Category::where('digital', 1)->get();
        return view('frontend.seller.digitalproducts.product_upload', compact('categories'));
    }

    public function show_digital_product_edit_form(Request $request, $id)
    {
        $categories = Category::where('digital', 1)->get();
        $product = Product::find(decrypt($id));
        return view('frontend.seller.digitalproducts.product_edit', compact('categories', 'product'));
    }
}
