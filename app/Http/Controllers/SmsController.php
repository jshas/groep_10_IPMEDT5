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

            echo $sms_count->count . ": ";
            echo "Message sent";
            echo ". Over 5 seconden wordt u weer terug gestuurd naar de homepagina";
            echo "<script>setTimeout(function(){ window.location.href = '/'; }, 5000);</script>";
        } 
        if($sms_count-> count == 3) {
            // Nexmo::message()->send([
            //     'to' => '31613013763',
            //     'from' => '31613013763',
            //     'text' => 'Er zijn nu al 3 sms'jes verstuurd. Vergeet niet op de reset knop te drukken als je weer sms'jes wilt ontvangen.'
            // ]);
            $affected = DB::table('sms_counting')
              ->update(['count' => $sms_count->count + 1]);

            echo $sms_count->count . ": ";
            echo 'Message sent';
            echo ". Over 5 seconden wordt u weer terug gestuurd naar de homepagina";
            echo "<script>setTimeout(function(){ window.location.href = '/'; }, 5000);</script>";
        }
        if($sms_count-> count > 3) {
            echo "Er zijn al genoeg smsjes verstuurd";
            echo ". Over 5 seconden wordt u weer terug gestuurd naar de homepagina";
            echo "<script>setTimeout(function(){ window.location.href = '/'; }, 5000);</script>";
        }

        
    }

    public function update()
    {
        $affected = DB::table('sms_counting')
              ->update(['count' => 0]);
        return redirect("/");
    }
}
