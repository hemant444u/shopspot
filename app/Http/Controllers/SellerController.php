<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\User;
use App\Shop;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\BusinessSetting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\OTPVerificationController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
use App\SellerDetail;
use App\SellerProductCategory;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
// require('Textlocal.class.php');

class SellerController extends Controller
{
 
    use SendsPasswordResetEmails;
    use RegistersUsers;


    public function storeSetup(){
        return view('seller_registration.seller-details.common');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $approved = null;
        $sellers = Seller::orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $user_ids = User::where('user_type', 'seller')->where(function($user) use ($sort_search){
                $user->where('name', 'like', '%'.$sort_search.'%')->orWhere('email', 'like', '%'.$sort_search.'%');
            })->pluck('id')->toArray();
            $sellers = $sellers->where(function($seller) use ($user_ids){
                $seller->whereIn('user_id', $user_ids);
            });
        }
        if ($request->approved_status != null) {
            $approved = $request->approved_status;
            $sellers = $sellers->where('verification_status', $approved);
        }
        $sellers = $sellers->paginate(15);
        return view('sellers.index', compact('sellers', 'sort_search', 'approved'));
    }
    
    public function pay_to_sellers(Request $request)
    {
        $sort_search = null;
        $approved = null;
        $sellers = Seller::where('admin_to_pay', '>', 0)->orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $user_ids = User::where('user_type', 'seller')->where(function($user) use ($sort_search){
                $user->where('name', 'like', '%'.$sort_search.'%')->orWhere('email', 'like', '%'.$sort_search.'%');
            })->pluck('id')->toArray();
            $sellers = $sellers->where(function($seller) use ($user_ids){
                $seller->whereIn('user_id', $user_ids);
            });
        }
        if ($request->approved_status != null) {
            $approved = $request->approved_status;
            $sellers = $sellers->where('verification_status', $approved);
        }
        $sellers = $sellers->paginate(15);
        return view('sellers.index', compact('sellers', 'sort_search', 'approved'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sellers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::where('email', $request->email)->first() != null){
            flash(__('Email already exists!'))->error();
            return back();
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = "seller";
        $user->password = Hash::make($request->password);
        if($user->save()){
            $seller = new Seller;
            $seller->user_id = $user->id;
            if($seller->save()){
                $shop = new Shop;
                $shop->user_id = $user->id;
                $shop->slug = 'demo-shop-'.$user->id;
                $shop->save();
                flash(__('Seller has been inserted successfully'))->success();
                return redirect()->route('sellers.index');
            }
        }

        flash(__('Something went wrong'))->error();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seller = Seller::findOrFail(decrypt($id));
        return view('sellers.edit', compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seller = Seller::findOrFail($id);
        $user = $seller->user;
        $user->name = $request->name;
        $user->email = $request->email;
        if(strlen($request->password) > 0){
            $user->password = Hash::make($request->password);
        }
        if($user->save()){
            if($seller->save()){
                flash(__('Seller has been updated successfully'))->success();
                return redirect()->route('sellers.index');
            }
        }

        flash(__('Something went wrong'))->error();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = Seller::findOrFail($id);
        Shop::where('user_id', $seller->user->id)->delete();
        Product::where('user_id', $seller->user->id)->delete();
        Order::where('user_id', $seller->user->id)->delete();
        OrderDetail::where('seller_id', $seller->user->id)->delete();
        User::destroy($seller->user->id);
        if(Seller::destroy($id)){
            flash(__('Seller has been deleted successfully'))->success();
            return redirect()->route('sellers.index');
        }
        else {
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    public function show_verification_request($id)
    {
        $seller = Seller::findOrFail($id);
        return view('sellers.verification', compact('seller'));
    }

    public function approve_seller($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->verification_status = 1;
        if($seller->save()){
            flash(__('Seller has been approved successfully'))->success();
            return redirect()->route('sellers.index');
        }
        flash(__('Something went wrong'))->error();
        return back();
    }

    public function reject_seller($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->verification_status = 0;
        $seller->verification_info = null;
        if($seller->save()){
            flash(__('Seller verification request has been rejected successfully'))->success();
            return redirect()->route('sellers.index');
        }
        flash(__('Something went wrong'))->error();
        return back();
    }


    public function payment_modal(Request $request)
    {
        $seller = Seller::findOrFail($request->id);
        return view('sellers.payment_modal', compact('seller'));
    }

    public function profile_modal(Request $request)
    {
        $seller = Seller::findOrFail($request->id);
        return view('sellers.profile_modal', compact('seller'));
    }

    public function updateApproved(Request $request)
    {
        $seller = Seller::findOrFail($request->id);
        $seller->verification_status = $request->status;
        if($seller->save()){
            return 1;
        }
        return 0;
    }

 /**
     * Display a page for seller registration.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration(Request $request)
    {
        return view('seller_registration.index');
    }

    public function benefits()
    {
        return view('seller_registration.benefits');
    }

    public function sellerFaq()
    {
        return view('seller_registration.faq');
    }

  

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            if(User::where('email', $request->email)->first() != null){
                flash(__('Email address already exists.'))->success();
                return response()->json(['error'=>'Email address already exists']);
                return back();
            }
        } if (User::where('phone', $request->phone)->first()!= null) {
            flash(__('Phone already exists.'))->success();
            return response()->json(['error'=>'Phone number already exists']);
            return back();
        }

        $user = $this->createSeller($request->all());
        return $user;
      
    }


        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|max:255',
            'phone' => 'required|min:10',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function registered(Request $request, $user)
    {
  
        // return redirect()->route('home');

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createSeller(array $data)
    {
            if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated){
                
                $verification_code = rand(1000, 9999);
                $user = User::create([
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => Hash::make($data['password']),
                    'verification_code' => $verification_code,
                    'user_type' => 'seller',
                    'country_code' => '+91'
                ]);

                $seller = new Seller;
                $seller->user_id = $user->id;
                $seller->save();
                $username = "2007anti20@gmail.com";
                $hash = "29cb1925f2e734aecc9b326cfb4ad4ea31e1e7d2db9fe96f024e400395e206c0";
            
                $test = "0"; 

                // $sender = "SHOPIN"; // This is who the message appears to be from.
                // $numbers = "+91".$data['phone']; // A single number or a comma-seperated list of numbers
                // $message = "Hi your OTP is ". $verification_code;
                // $message = urlencode($message);
                // $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;

                $apiKey = urlencode('X6dSD8+Da9E-zQCzabs4vszb9ShiWWZxvAIBfLYaMs');
	
                // Message details
                $numbers = array($data['phone']);
                $sender = urlencode('SHOPIN');
                $message = rawurlencode('Hi your OTP is '. $verification_code);
             
                $numbers = implode(',', $numbers);
             
                // Prepare data for POST request
                $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
                
                $ch = curl_init('http://api.textlocal.in/send/');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                curl_close($ch);

        return $user;
    }
}

public function login(Request $request)
{

    $request->validate([
        'emailAddress' => 'required|string|email',
        'password' => 'required|string'
    ]);
    
    
    $credentials = request(['emailAddress', 'password']);
    unset($credentials['emailAddress']);
    $credentials['email'] = $request->emailAddress;
    if (!Auth::attempt($credentials))
        return response()->json(['message' => 'Unauthorized'], 401);
    $user = User::where('email', $credentials['email'])->first();
     if($user->is_verified == 0) {
          $user->update([
                    'is_verified' => 1,
                    'email_verified_at'=> Carbon::now(),
                    
                ]);
     }
    //     $verification_code = rand(1000, 9999);
    //     $username = "2007anti20@gmail.com";
    //     $hash = "29cb1925f2e734aecc9b326cfb4ad4ea31e1e7d2db9fe96f024e400395e206c0";
    //     $user = User::where('email', $credentials['email'])->first();
    //     $test = "0"; 

	// $apiKey = urlencode('X6dSD8+Da9E-zQCzabs4vszb9ShiWWZxvAIBfLYaMs');
	

	// $numbers = array($user->phone);
	// $sender = urlencode('SHOPIN');
	// $message = rawurlencode('Hi your OTP is '. $verification_code);
 
	// $numbers = implode(',', $numbers);
 
    // $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
    
    //     $ch = curl_init('http://api.textlocal.in/send/');
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $result = curl_exec($ch)
    //     curl_close($ch);
    //     $user->update([
    //         'verification_code'=> $verification_code
    //     ]);
    //     return response()->json(['error'=>'Phone number is not verified', 'user'=> $user]);
    //  }
    $tokenResult = $user->createToken('Personal Access Token');
   
   
    return $this->loginSuccess($tokenResult, $user);
}

protected function loginSuccess($tokenResult, $user)
{
     
    $token = $tokenResult->token;
    $token->expires_at = Carbon::now()->addWeeks(100);
    $token->save();
    return response()->json([
        'access_token' => $tokenResult->accessToken,
        'token_type' => 'Bearer',
        'expires_at' => Carbon::parse(
            $tokenResult->token->expires_at
        )->toDateTimeString(),
        'user' => [
            'id' => $user->id,
            'type' => $user->user_type,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'avatar_original' => $user->avatar_original,
            'address' => $user->address,
            'country'  => $user->country,
            'city' => $user->city,
            'postal_code' => $user->postal_code,
            'phone' => $user->phone,
            'is_verified' => $user->is_verified
        ]
    ]);
}

protected function verify(Request $request)
{  
    $data = $request->validate([
        'verification_code' => ['required', 'numeric'],
        'phone' => ['required']
    ]);
      
   
        $user = User::where('phone', $data['phone'])->first();
        if($user){
            if($user->verification_code == $request->verification_code)
            {
                $user->update([
                    'is_verified' => 1
                ]);
                auth()->login($user, true);
                $this->mailsend($user);
                return redirect()->route('seller-welcome')->with('status', 'OTP verification successfully');
            }
            
        }

    
    return back()->with(['phone' => $data['phone'], 'error' => 'Invalid verification code entered!']);
}


public function mailsend($user)
{
    $details = [
        'title' => 'Welcome Seller',
        'body' => 'Thanks for showing interest in our website'
    ];

    \Mail::to($user->email)->send(new SendMail($details));
    // return redirect()->route('thanks.mail');
    // return redirect->('thanks.mail');
}





/**
     * Store seller details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sellerDetails(Request $request)
    {
        // dd($request);
        $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'residental_address' => 'required',
            'residental_address_proof_type' => 'required',
            'residental_city' => 'required',
            'residental_state' => 'required',
            'residental_pincode' => 'required',
            // 'residental_address_proof_file' => 'required',
            // 'signature_upload' => 'required',
        ]);
        // dd('sidhihdi    ');
        $seller = SellerDetail::where('user_id',Auth::user()->id);
   
        $seller->update([
            'seller_first_name'=> $request->first_name,
            'seller_second_name'=> $request->second_name,
            'seller_email'=>  $request->email,
            'seller_mobile'=>  $request->mobile,
            'seller_residental_address'=> $request->residental_address,
            'seller_residental_city'=> $request->residental_city,
            'seller_residental_state'=> $request->residental_state,
            'seller_residental_pincode'=> $request->residental_pincode,
            'seller_proof_of_address_type'=> $request->residental_address_proof_type,
             
        ]);

        if($request->hasFile('residental_address_proof_file')){
            $fileExtension =  $request->file('residental_address_proof_file')->extension();
            $filename = 'residental_address_proof_file-' . time() . '.' . $fileExtension;
            $seller->update([
                'seller_proof_of_address' =>  $request->residental_address_proof_file->storeAs('uploads/seller', $filename)
            ]);
        }

        if($request->hasFile('signature_upload')){
            $fileExtension =  $request->file('signature_upload')->extension();
            $filename = 'signature_upload-' . time() . '.' . $fileExtension;
            $seller->update([
                'signature_upload' =>  $request->signature_upload->storeAs('uploads/seller', $filename)
            ]);
        }

        if($request->update == true){
            return redirect()->route('seller.store.setting');
        }

            flash(__('Your Account Details has been updated successfully!'))->success();
            return redirect()->route('store-details-form')->with('status', 'success');
    }

    /**
     * Store a seller store details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDetails(Request $request)
    {
//  dd($request);
        $request->validate([
            // 'store_type' => 'required|string',
            'store_name' => 'required|string',
            // 'pan_card' => 'required',
            'store_address' => 'required|string',
            'store_address_city' => 'required|string',
            'store_address_state' => 'required|string',
            'store_address_pincode' => 'required|string',
            // 'store_logo' => 'required',
            // 'store_address_proof' => 'required',
            'pan_card_number' => 'required',
            'pick_up_address' => 'required',
            'pick_up_address_city' => 'required',
            'pick_up_address_state' => 'required',
            'pick_up_address_pincode' => 'required',
            
        ]);

       $seller = SellerDetail::where('user_id',Auth::user()->id);
       $seller->update([
        'company_type'=> $request->store_type,
        'store_name'=> $request->store_name,
        'store_email'=>  Auth::user()->email,
        'store_mobile'=>  Auth::user()->phone,
        'store_gst_in'=> $request->store_gst,
        'store_tan_no'=> $request->store_tan,
        'store_address'=> $request->store_address,
        'store_address_city'=> $request->store_address_city,
        'store_address_state'=> $request->store_address_state,
        'store_address_pincode'=> $request->store_address_pincode,
        'store_address_proof_type'=> $request->store_address_proof_type,
        'pan_card_number' => $request->pan_card_number,
        'pick_up_address' => $request->pick_up_address,
        'pick_up_address_city' => $request->pick_up_address_city,
        'pick_up_address_state' => $request->pick_up_address_state,
        'pick_up_address_pincode' => $request->pick_up_address_pincode,

        ]);

        if($request->hasFile('store_logo')){
            $fileExtension =  $request->file('store_logo')->extension();
            $filename = 'store_logo-' . time() . '.' . $fileExtension;
            $seller->update([
                'store_logo' =>  $request->store_logo->storeAs('uploads/seller', $filename)
            ]);
        }

        if($request->hasFile('pan_card')){
            $fileExtension =  $request->file('pan_card')->extension();
            $filename = 'pan_card-' . time() . '.' . $fileExtension;
            $seller->update([
                'pan_card' =>  $request->pan_card->storeAs('uploads/seller', $filename)
            ]);
        }

        if($request->hasFile('store_address_proof')){
            $fileExtension =  $request->file('store_address_proof')->extension();
            $filename = 'store_address_proof-' . time() . '.' . $fileExtension;
            $seller->update([
                'store_address_photo_proof' =>  $request->store_address_proof->storeAs('uploads/seller', $filename)
            ]);
        }

        if($request->update == true){
            return redirect()->route('seller.store.setting');
        }

        flash(__('Your Account Details has been updated successfully!'))->success();
        return redirect()->route('seller-payment-details-form')->with('status', 'success');
    }

    /**
     * Store a seller store details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCourierPickUpDetails(Request $request)
    {
    $timestamp = time();
    $appID = 4637;
    $key = 'CzJf+bbsYKM=';
    $secret = 'EueI3pge6fENeAN41G4smEHL/yMNtC3K3VJFfjRn6IJE2L+TfMnJE0uOXGKaJYD9d1VlbY9mYYYQqcJTOi7cFQ==';

    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
    $ch = curl_init();

  
    $header = array(
        "x-appid: $appID",
        "x-timestamp: $timestamp",
        "x-sellerid:27597",
        "x-version:3",
        "Authorization: $authtoken"
    );

    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/getserviceability/'.$request->store_pickup_courier_pin_code.'/209861');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    $service_available = json_decode($server_output, true);
    curl_close($ch);
    if($service_available["serviceability"]["airPrepaid"] == true) {
        $seller = SellerDetail::where('user_id',Auth::user()->id);
        $seller->update([
        'store_pickup_courier_pin_code'=> $request->store_pickup_courier_pin_code,
        ]);
        return response()->json(['data'=>'success']);
    }
    else {
        return response()->json(['error'=>'Courier service is not available in your area']);
    }
    
    // if($service_available['airPrepaid'])
    // return response()->json(['data'=>$service_available]);
     //    $seller = SellerDetail::where('user_id',Auth::user()->id);
    //    $seller->update([
    //     'store_pickup_courier_pin_code'=> $request->store_pickup_courier_pin_code,
    //     ]);

        // flash(__('Your Account Details has been updated successfully!'))->success();
        // return redirect()->route('seller-details-form')->with('status', 'success');

    }

     /**
     * Store a seller store payment details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePayment(Request $request)
    {
        // dd($request);
        $seller = Seller::where('user_id',Auth::user()->id)->first();
        $seller->update([
            'bank_name'=> $request->bank_name,
            'bank_acc_name'=> $request->bank_acc_name,
            'bank_acc_no'=> $request->bank_acc_no,
            'ifsc_code'=> $request->ifsc_code,
            'paypal_email'=> $request->paypal_email,
            ]);

            if($request->hasFile('cheque')){
                $fileExtension =  $request->file('cheque')->extension();
                $filename = 'cheque-' . time() . '.' . $fileExtension;
                $seller->update([
                    'cheque' =>  $request->cheque->storeAs('uploads/seller', $filename)
                ]);
            }
            if($request->update == true){
                return redirect()->route('seller.store.setting');
            }
            
        
            flash(__('Your Account Details has been updated successfully!'))->success();
            return redirect()->route('seller.dashboard')->with('status', 'success');

    }

      /**
     * Store a seller store product details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProductDetails(Request $request)
    {  

     $categories =array_keys($request->toArray());
     $categoriesArray = $request->toArray();
     unset($categories[0]);
     $ProductCategoryArray=[];
     $sellerProductCategory = SellerProductCategory::get(['id','name']);
      for($i=0;$i<sizeof($sellerProductCategory);$i++){

            if(in_array($sellerProductCategory[$i]->name, $categories))
            {
                array_push($ProductCategoryArray, ['id' => $sellerProductCategory[$i]->id, 'value' => $categoriesArray[$sellerProductCategory[$i]->name]]);    
            }
        }
        
        $existingSeller = SellerDetail::where('user_id', Auth::user()->id)->first();
        if($existingSeller) {
            $existingSeller->update([
                'seller_id'=> Auth::user()->seller->id,
                'user_id'=> Auth::user()->id,
                'products'=> json_encode($ProductCategoryArray),
                'products_get_from'=> json_encode($request->products_from),
                ]);

            flash(__('Your Account Details has been updated successfully!'))->success();
            return redirect()->route('courier_pickup-form')->with('status', 'success');
        }
        else{
            $seller_detail = new SellerDetail;

            $seller_detail->seller_id = Auth::user()->seller->id;
            $seller_detail->user_id = Auth::user()->id;
            $seller_detail->products = json_encode($ProductCategoryArray);
            $seller_detail->products_get_from = json_encode($request->products_from);
    
            if($seller_detail->save()){
                flash(__('Your Account Details has been updated successfully!'))->success();
                return redirect()->route('courier_pickup-form')->with('status', 'success');
            }
        }
       

        flash(__('Sorry! Something went wrong.'))->error();
        return back();

    }

       /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $this->validateEmail($request);
            $response = $this->broker()->sendResetLink(
                $this->credentials($request)
            );

            $seller = User::where('email', $request->email)->first();
            if($seller) {
                Password::RESET_LINK_SENT
                ? $this->sendResetLinkResponse($request, $response)
                : $this->sendResetLinkFailedResponse($request, $response);
                return response()->json(['data'=>'Email sent successfully']);
            }

            return response()->json(['error'=>'Email address doesnot exist']);
            
        }
        else{
            $user = User::where('phone', $request->email)->first();
            if ($user != null) {
                $user->verification_code = rand(100000,999999);
                $user->save();
                sendSMS($user->phone, env('APP_NAME'), $user->verification_code.' is your verification code');
                return view('otp_systems.frontend.auth.passwords.reset_with_phone');
            }
            else {
                flash('No account exists with this phone number')->error();
                return back();
            }
        }
    }

}
