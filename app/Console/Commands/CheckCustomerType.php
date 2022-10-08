// <?php
   
// namespace App\Console\Commands;
   
// use Illuminate\Console\Command;
// use App\OrderDetail;  
// use App\Seller;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Carbon;

// class CheckCutomerType extends Command
// {
//     /**
//      * The name and signature of the console command.
//      *
//      * @var string
//      */
//     protected $signature = 'sellertype:check';
    
//     /**
//      * The console command description.
//      *
//      * @var string
//      */
//     protected $description = 'This will update the seller type';
    
//     /**
//      * Create a new command instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         parent::__construct();
//     }
    
//     /**
//      * Execute the console command.
//      *
//      * @return mixed
//      */
//     public function handle()
//     {
//         $sellers = OrderDetail::groupBy('seller_id')->get();

//         foreach($sellers as $seller) {
//             $selling_value = OrderDetail::select(DB::raw('SUM(price) as prices'))->where('created_at', '>=',Carbon::now()->subDay(30))->where('seller_id',$seller->seller_id)->pluck('prices');
//             if($selling_value[0] <= 100000){
//                 $sellerA = Seller::where('user_id', $seller->seller_id)->update(['seller_type' => 'Stone']);
//             }
//             if($selling_value[0] > 100000 && $selling_value[0] < 1000000 ){
//                 $sellerA = Seller::where('user_id', $seller->seller_id)->update(['seller_type' => 'Jewel']);
//             }
//             if( $selling_value[0] >= 1000000 ){
//                 $sellerA = Seller::where('user_id', $seller->seller_id)->update(['seller_type' => 'Gem']);
//             }
//         }
//     }
// }