<?php

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

Route::get('/rooms/create', [RoomController::class, 'create']);
Route::post('/rooms', [RoomController::class, 'store']);






Route::get('/room', function(){
    return view('roomcard');
});
