<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function verifyDiscountCode($vouchercode){

        $response = Voucher::where('code', '=', $vouchercode)->get();

        if($response->count() === 0){
            return 0;
        }

        return $response[0]['id'];
    }
}
