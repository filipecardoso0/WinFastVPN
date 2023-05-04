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
        else if($server === 'chile'){
            $file = public_path()."/profiles/Win Fast VPN - Chile - Warzone 2.ovpn";
            $name = "Win Fast VPN - Chile - Warzone 2.ovpn";
        }
        else if($server === 'mexico'){
            $file = public_path()."/profiles/Win Fast VPN - Mexico - Warzone 2.ovpn";
            $name = "Win Fast VPN - Mexico - Warzone 2.ovpn";
        }
        else if($server === 'southafrica'){
            $file = public_path()."/profiles/Win Fast VPN - South Africa - Warzone 2.ovpn";
            $name = "Win Fast VPN - South Africa - Warzone 2.ovpn";
        }
        else if($server === 'brazil'){
            $file = public_path()."/profiles/Win Fast VPN - Brazil - Warzone 2.ovpn";
            $name = "Win Fast VPN - Brazil - Warzone 2.ovpn";
        }
        else if($server === 'japan'){
            $file = public_path()."/profiles/Win Fast VPN - Japan - Warzone 2.ovpn";
            $name = "Win Fast VPN - Japan - Warzone 2.ovpn";
        }
        else if($server === 'hawai'){
            $file = public_path()."/profiles/Win Fast VPN - Hawai - Warzone 2.ovpn";
            $name = "Win Fast VPN - Hawai - Warzone 2.ovpn";
        }
        else if($server === 'singapore'){
            $file = public_path()."/profiles/Win Fast VPN - Singapore - Warzone 2.ovpn";
            $name = "Win Fast VPN - Singapore - Warzone 2.ovpn";
        }
        else if($server === 'australia'){
            $file = public_path()."/profiles/Win Fast VPN - Australia - Warzone 2.ovpn";
            $name = "Win Fast VPN - Australia - Warzone 2.ovpn";
        }
        else{
            return redirect('/');
        }

        return response()->download($file, $name, $headers);
    }
}
