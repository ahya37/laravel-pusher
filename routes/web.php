<?php

use App\Events\MessageCreated;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    MessageCreated::dispatch('tidak oke');
    return view('chart');
});

Route::get('/message/created', function(){
    MessageCreated::dispatch('lorem ipsum dolor sit amet');
});

Route::get('/data/created', [CounterController::class,'getArray']);
Route::get('/data', [CounterController::class,'index'])->name('data.index');
Route::post('/data/get', [CounterController::class,'getData']);

// Laravel test
Route::view('/template','template');

Route::controller(UserController::class)->group(function(){
    Route::get('/login','login');
    Route::post('/login','doLogin');
    Route::post('/logout','doLogout');
});

