<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index()
    {
     
        // $temperature = \App\Models\Temperature::all();
        // $infrared = \App\Models\Infrared::all();
        
        //             foreach ($infrared as $ifr) {
        //                 if ($ifr->fire == "ja") {
        //                     return redirect('/sms');
        //                 }
        //             }
        //     }
        // }
        // foreach ($infrared as $ifr) {
        //     if ($ifr->ifr_value == "0") {
        //         foreach ($temperature as $temp) {
        //             if ($temp->temperature >= 50.0) {
        //                 return redirect('/sms');
        //             }
        //         }
        //     }
        //}
        // return view('default')->with(compact('temperature', 'infrared'));
    }
}
