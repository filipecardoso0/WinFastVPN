<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function showTOS(){
        return view('static.tos');
    }

    public function showPrivacy(){
        return view('static.privacypolicy');
    }
}
