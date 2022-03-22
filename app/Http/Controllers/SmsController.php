<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function index()
    {
        Nexmo::message()->send([
            'to' => '31613013763',
            'from' => '31613013763',
            'text' => 'Brand Gedetecteerd!!!'
        ]);

        echo 'Message sent';
        echo "<script>setTimeout(function(){ window.location.href = '/'; }, 5000);</script>";
    }
}
