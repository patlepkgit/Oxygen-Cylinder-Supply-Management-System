<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Booking;


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

// Route::get('/', function () {
//     return view('layouts.app');
// });
Route::get('/', 'MainController@main');

Route::get('/register', 'Auth\AuthController@register')->name('register');
Route::post('/register', 'Auth\AuthController@storeUser');
Route::post('api/fetch-cities', 'Auth\AuthController@fetchCity');

Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/login', 'Auth\AuthController@authenticate');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');
Route::get('/dashboard', 'Auth\AuthController@home')->name('dashboard');
Route::get('/dashboard', 'StockController@fetchData')->name('dashboard');
Route::view('/edit','update')->name('edit');
Route::post('/dashboard','StockController@storedata')->name('update');
Route::post('api/process','StockController@process')->name('process');


// Route::get('dependent-dropdown', [DropdownController::class, 'index']);
// Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);

Route::get('db', 'DropdownController@all');

Route::get('/booking', 'BookingController@book')->name('booking');
Route::post('/booking', 'BookingController@storeUser');
Route::post('api/fetch_cities', 'BookingController@fetch_city');
Route::post('api/fetch_supplier', 'BookingController@fetch_supplier');
Route::post('api/fetch_quantity', 'BookingController@fetch_quantity');

Route::post('api/search_by', 'BookingController@search_by');

Route::get('/date', function () {
    return view('date');
});

Route::get('/booking_status', 'BookingController@status')->name('booking_status');

Route::get('/stocks', 'StockController@stock')->name('stocks');


Route::any('/search',function(Request $request){
    $q = $request->input( 'q' );
    $user = Booking::where('supplier_name','LIKE','%'.$q.'%')->orWhere('cylinder_qty','LIKE','%'.$q.'%')->select('id','name','supplier_name','cylinder_qty')->get();
    if(count($user) > 0)
        return view('booking_status')->withDetails($user)->withQuery ( $q );
    else return view('booking_status')->with('status','No Details found. Try to search again !');
});