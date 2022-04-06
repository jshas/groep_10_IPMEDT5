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


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::controller(Roomcontroller::class)->group(function () {
    // READ
    Route::get('/', 'index');
    Route::get('/rooms', 'index');
    Route::get('/rooms/{name}/show', 'show');
    // CREATE
    Route::get('/rooms/create', 'create');
    Route::post('/rooms', 'store');
    //UPDATE

    //DELETE
    // Single room

});




Route::get('/room', function(){
    return view('roomcard');
});
