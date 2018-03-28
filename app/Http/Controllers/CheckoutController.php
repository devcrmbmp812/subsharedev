<?php


namespace App\Http\Controllers;

use App\Http\Middleware\AuthorizeAdmin;
use App\Http\Middleware\AuthorizeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Transaction;
use Carbon\Carbon as Carbon; // for date and time.

class CheckoutController extends Controller
{
    public function __construct()
    {
    }
    public function index(){
            return view('checkout.index');
        
    }
    public function proceedPayment($id){
        if(Auth::check()) {
            $check = array();
            $check = DB::table('packages')->select('*')->where('id',$id)->first();
            $pid = $id;
            return view("checkout.proceed",compact('check','pid'));
        }else{
            return redirect('/login');
        }
    }
    public function PaymentNow(Request $request){
        if(Auth::check()) {
            $package = $request->input('package_id');
            $amount = $request->input('oamount');
            $quantity = $request->input('quantity');
            DB::table('packagetransaction')->insert([
                "user_id"=>Auth::user()->id,
                "package_id"=>$package,
                "amount"=>$amount,
                "quantity"=>$quantity,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $amount = ($amount * $quantity)*100;
            return view("checkout.paymant",compact('amount'));
        }else{
             return redirect('/login');
        }
    }
    public function PaymentProcess(){
        if(Auth::check()) {
            return view("checkout.paymant");
        }else{
            return redirect('/login');
        }
    }
    public function savestripe(Request $request){
        dd($request);
    }
    public function stripepay(Request $request){
        //$apiKey = 'sk_live_9KFZCcC09X3HzwGp1CeZqSvq';
        $apiKey = 'sk_test_G9rvUH4CGNeve0gEpzMTVmJr';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://api.stripe.com/v1/charges",
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $apiKey
            ),
            CURLOPT_POSTFIELDS => http_build_query(array(
                "amount" => $request->input('amount', '1'),
                "currency" => 'USD',
                "source" => array(
                    "object" => "card",
                    "number" =>  $request->input('card_no') ,
                    "exp_month" =>  $request->input('month') ,
                    "exp_year" =>  $request->input('year') ,
                    "cvc" =>  $request->input('cvv_no')
                ),
                "description" => "Subshare Pay"
            ))
        ));

        $resp = curl_exec($curl);
        curl_close($curl);
        $resp = json_decode($resp);
        if (isset($resp->error)) {
            $ret = '<div class="alert alert-danger"><strong>Error!</strong>'. $resp->error->message .'</div>';
        } else {
           $ret = '<div class="alert alert-success"><strong>Success!</strong> Your Payment has been made.</div>';
            DB::table('transactions')->insert([
                "user_id"=>Auth::user()->id,
                "title"=>"Stripe Package Purchased",
                "details"=>"you have purchased a package with a cost of ".$request->input('amount', '1')."",
                "currency"=>"USD",
                "invoiceNumber"=>000,
                "amount"=>$request->input('amount', '1') / 100,
                "status"=>'1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        return $ret;
    }
    public function paypalpay(Request $request){
        DB::table('transactions')->insert([
            "user_id"=>Auth::user()->id,
            "title"=>"Paypal Package Purchased",
            "details"=>"you have purchased a package with a cost of ".$request->input('amount', '1')."",
            "currency"=>"USD",
            "invoiceNumber"=>000,
            "amount"=>$request->input('amount', '1') / 100,
            "status"=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $ret = '<div class="alert alert-success"><strong>Success!</strong> Your Payment has been made.</div>';
        return $ret;
    }
}
