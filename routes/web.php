<?php

declare(strict_types=1);

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
    return view('welcome');
});

Auth::routes();
Route::view('/payment','payment');
Route::view('/admin', 'admin');
Route::view('/welcome', 'welcome');
Route::view('/patient-create-appointment','patient-create-appointment');
Route::view('/addToCart', 'addToCart');
Route::get('admin/update/{user}', 'UserController@update')->name('user.update');
Route::get('/home', 'HomeController@index')->name('home');

Route::view('/view', 'view');
Route::view('/help', 'help');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/physician', 'Auth\LoginController@showLoginForm');
Route::post('/login/physician', 'Auth\LoginController@validateLoginPhysicians')->name('login.physician');

Route::get('/login/nurse', 'Auth\LoginController@showLoginForm');
Route::post('/login/nurse', 'Auth\LoginController@validateLoginNurses')->name('login.nurse');

Route::get('/view', 'ViewController@index')->name('view');

Route::get('createPhysician', 'Auth\CreatePhysicianController@showcreatePhysicianForm')->name('createPhysician');
Route::post('createPhysician', 'Auth\CreatePhysicianController@register');

Route::get('createNurse', 'Auth\CreateNurseController@showcreateNurseForm')->name('createNurse');
Route::post('createNurse', 'Auth\CreateNurseController@register');

Route::resource('appointments', 'AppointmentController')->only(['store', 'show','update','destroy']);
Route::resource('cart_appointments', 'CartAppointmentController')->only(['store', 'show','update','destroy']);
Route::resource('availability', 'AvailabilityController')->only(['store', 'show','update','destroy']);
Route::resource('rooms', 'RoomController')->only(['store', 'show','update','destroy']);

Route::post('patient-create-appointment', function() {
    return view('patient-create-appointment');
})->name('patient-create-appointment');

Route::get('/addAppointmentToCart/{appointment}', 'BookAppointmentsController@addAppointmentToCart')->name('appointment.addToCart');
Route::get('/removeAppointmentFromCart{appointment}','BookAppointmentsController@removeAppointmentFromCart')->name('appointment.removeFromCart');
Route::get('/cancelTransaction','BookAppointmentsController@cancelTransaction')->name('appointment.cancelTransaction');
Route::get('/cancelAppointment','BookAppointmentsController@cancelAppointment')->name('appointment.cancelAppointment');
Route::get('/checkoutCart','BookAppointmentsController@checkoutCart')->name('appointment.checkoutCart');
Route::get('/updateAppointment{appointment}','BookAppointmentsController@updateAppointment')->name('appointment.updateAppointment');

