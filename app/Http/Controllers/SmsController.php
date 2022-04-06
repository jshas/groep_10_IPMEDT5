<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use DB;

class SmsController extends Controller
{
    public function index()
    {
        // Count voor de sms ophalen
        $sms_count = \App\Models\SmsCount::first();

        if($sms_count-> count <= 2) {
            // Nexmo::message()->send([
            //     'to' => '31613013763',
            //     'from' => '31613013763',
            //     'text' => 'Brand Gedetecteerd!!!'
            // ]);
            $affected = DB::table('sms_counting')
              ->update(['count' => $sms_count->count + 1]);

            echo $sms_count->count;
            echo 'Message sent';
            echo "<script>setTimeout(function(){ window.location.href = '/'; }, 5000);</script>";
        } else {
            echo "Er zijn al genoeg smsjes verstuurd";
            echo "<script>setTimeout(function(){ window.location.href = '/'; }, 5000);</script>";
        }

        
    }
}
