<?php

use App\Livewire\PlaceDetails;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('homepage' ,'App\Http\Controllers\HomeController@index');
Route::get('setup-your-place' , 'App\Http\Controllers\PlaceController@index')->middleware('auth');
Route::get('rooms/{place_slug}'  , 'App\Http\Controllers\PlaceController@show');
Route::get('book/stays'  , 'App\Http\Controllers\PlaceController@showBookings')->middleware('auth');
Route::post('book/store' , 'App\Http\Controllers\PlaceController@store')->middleware('auth');
Route::get('404' ,'App\Http\Controllers\HomeController@routeFailure');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::fallback(function () {
    return redirect('404');
});