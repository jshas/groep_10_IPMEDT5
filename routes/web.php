<?php

use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SensorController;
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

Route::resource('rooms', RoomController::class)->except('show');

// All sensor routes:
Route::resource('rooms.sensor', SensorController::class)->except([
        'index', 'show'
])->shallow();

Route::redirect('/', '/rooms/', 301);

Route::get('/sms', [SmsController::class, 'index']);

// Deze route zorgt ervoor dat de smscontroller update functie wordt aangesproken. Dit reset de database van sms_couting.
Route::get('/reset', [SmsController::class, 'update']);




// Route::controller(Roomcontroller::class)->group(function () {
//     // CREATE
//     Route::get('/rooms/create', 'create')->name('rooms.create');
//     Route::post('/rooms', 'store');
    
//     // READ
//     Route::get('/', 'index');
//     Route::get('/rooms/index', 'index');
//     Route::get('/rooms', 'index');
//     Route::get('/rooms/{room}', 'show');


//     //UPDATE
//     Route::get('/rooms/{room}/edit', 'edit')->name('rooms.edit');
//     Route::patch('/rooms/{room:name}', 'update')->name('rooms.update');

//     //DELETE                    
//     Route::delete('/rooms/{room:name}', 'destroy')->name('rooms.delete');;
        
// });