<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The table associated with the model. (Overrides laravel's default naming convention)
     *
     * @var string
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid', 'productid', 'voucherid'
    ];

    protected $table = 'transactions';

    protected $primaryKey = 'id'; //Overrides laravel's default pk for game table

    public static function fetchReferralEarnings($voucherid){

        $query = DB::table('transactions')
            ->select((DB::raw('sum(price) as totalsales')))
            ->join('products', 'products.id', '=', 'transactions.productid')
            ->join('vouchers', 'vouchers.id', '=', 'transactions.voucherid')
            ->where('voucherid', '=', $voucherid)
            ->get();

        return $query[0]->totalsales;
    }
}
