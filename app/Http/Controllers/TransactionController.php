<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function proceed2Checkout(int $productid){

        $product = Product::find($productid);

        if($product === null){
            return redirect('/');
        }
        else{
            return view('pages.checkout')
                ->with('product', $product);
        }
    }

    public function store(Request $request){


        $validator = $request->validate([
            'productid' => 'required|integer|min:1|max:3',
            'voucherid' => 'required|integer',
        ]);

        $voucherid = (int)$request->get('voucherid');
        $finalvoucherid = null;

        if($voucherid != 0){
            $finalvoucherid = $voucherid;
        }

        Transaction::create([
            'userid' => $request->user()->id,
            'productid' => (int)$request->get('productid'),
            'voucherid' => $finalvoucherid
        ]);

    }
}
