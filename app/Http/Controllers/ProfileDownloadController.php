<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ProfileDownloadController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'subscriptionactive']);
    }

    public function profiledownload($server){

        $headers = array(
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
            'Content-Description' => 'File Transfer',
            'Content-Type' => 'application/pdf'
        );

        if($server === 'india'){
            $file = public_path()."/profiles/Win Fast VPN - India - Warzone 2.ovpn";
            $name = "Win Fast VPN - India - Warzone 2.ovpn";
        }
        else if($server === 'japao'){
            $file = public_path()."/profiles/Win Fast VPN - India - Warzone 2.ovpn";
            $name = "PO CARALHO";
        }
        else{
            return redirect('/');
        }

        return response()->download($file, $name, $headers);
    }
}
