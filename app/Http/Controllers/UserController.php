<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){

        $userid = auth()->user()->id;

        $resp = self::isSubscriptionActive($userid);

        $earnings = self::referralEarnings($userid);

        return view('pages.userdashboard')
            ->with('subscriptionstatus', $resp)
            ->with('referralearnings', $earnings);
    }

    public static function isSubscriptionActive(int $userid){

        $transactions = Transaction::where('userid', '=', $userid)->orderbyRaw('transactiondate DESC')->get();

        if($transactions->count() === 0)
            return false;

        $mostrecentsubscription = $transactions[0];
        $mostrecentsubscriptionproduct = $mostrecentsubscription['productid'];
        $mostrecentsubscriptiondate = $mostrecentsubscription['transactiondate'];

        $product = Product::find($mostrecentsubscriptionproduct);
        $productdurationdays = $product['durationdays'];

        $finalsubscriptiondate = Carbon::parse($mostrecentsubscriptiondate)->addDays($productdurationdays);

        $datenow = Carbon::parse(Carbon::now());

        if( ($datenow->gt($finalsubscriptiondate)))
            return false;

        return true;
    }

    public static function referralEarnings($userid){
        $resp = Voucher::where('userid', '=', $userid)->get();

        if($resp->count() === 0){
            return 0;
        }
        else{
        $uservoucherid = $resp[0]['id'];

        $totalsum = Transaction::fetchReferralEarnings($uservoucherid);

        $earnings = $totalsum * 0.25;

        return $earnings;
        }
    }
}
