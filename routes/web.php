<?php

use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use App\Models\Sensor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RoomController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route::get("/sensor", [\App\Http\Controllers\RoomController::class, "fire"]);

Route::get('/sms', [SmsController::class, 'index']);

// De default route kan je verwijderen
Route::get('/default', function () {
    return view('default');
});

// Deze route zorgt ervoor dat de smscontroller update functie wordt aangesproken. Dit reset de database van sms_couting.
Route::get('/reset', [SmsController::class, 'update']);
