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
// Route::resource('rooms', 'App\Http\Controllers\RoomController');

Route::controller(Roomcontroller::class)->group(function () {
    // CREATE
    Route::get('/rooms/create', 'create')->name('rooms.create');
    Route::post('/rooms', 'store');
    
    // READ
    Route::get('/', 'index');
    Route::get('/rooms/index', 'index');
    Route::get('/rooms', 'index');
    Route::get('/rooms/{room}', 'show');


    //UPDATE
    Route::get('/rooms/{room}/edit', 'edit')->name('rooms.edit');
    Route::patch('/rooms/{room:name}', 'update')->name('rooms.update');

    //DELETE                    
    Route::delete('/rooms/{room:name}', 'destroy')->name('rooms.delete');;
        
});





Route::get('/room', function(){
    return view('roomcard');
});
