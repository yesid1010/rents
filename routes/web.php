<?php

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

    if(Auth::check()){
        return redirect('rooms');
    }else{
        return view('auth.login');
    }
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('status/{id}','RoomController@Status')->name('status');
    Route::post('deletedroom','RoomController@destroy')->name('destroyroom');
    Route::post('deletedservice','ServiceController@destroy')->name('destroyservice');

    Route::get('statusrent/{id}','RentController@State')->name('staturents');

    Route::post('addservice','RentController@AddService')->name('addservices');

    Route::post('addservice','RentController@AddService')->name('addservices');

    Route::post('saverent','RentController@save')->name('save');


    Route::resource('rooms', 'RoomController');
    Route::resource('rents', 'RentController');
    Route::resource('services', 'ServiceController');
    Route::resource('payments', 'PaymentController');
    Route::resource('users', 'UserController');
});
Auth::routes();


