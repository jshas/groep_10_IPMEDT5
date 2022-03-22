<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    public function index()
    {
        $temperature = \App\Models\Temperature::all();
        foreach ($temperature as $sensor) {
            if ($sensor->temperature >= 50.0) {
                return redirect('/sms');
            }
        }
        return view("default", [
            "temperature" => \App\Models\Temperature::all()
        ]);
    }
}
