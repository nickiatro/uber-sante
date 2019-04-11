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

Route::get('/doctor', function () {
    return view('welcomePhysician');
});

Route::get('/nurses', function () {
    return view('welcomeNurse');
});

Auth::routes();
Route::view('/payment','payment');
Route::view('/admin', 'admin');
Route::view('/welcome', 'welcome');
Route::view('/welcomePhysician', 'welcomePhysician');
Route::view('/welcomeNurse', 'welcomeNurse');
Route::view('/patient-create-appointment','patient-create-appointment');
Route::view('/createAvailability','createAvailability');
Route::view('/myAvailabilities','myAvailabilities');
Route::view('/addToCart', 'addToCart');
Route::view('/addToCartPhysician', 'addToCartPhysician');
Route::get('admin/update/{user}', 'UserController@update')->name('user.update');
Route::get('/home', 'HomeController@index')->name('home');

Route::view('/view', 'view');
Route::view('/viewPhysician', 'viewPhysician');
Route::view('/help', 'help');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/physician/login', 'Auth\physicianLoginController@showLoginForm')->name('physician.login');
Route::post('/physician/login', 'Auth\physicianLoginController@login')->name('physician.login.post');
Route::post('/physician/logout', 'Auth\physicianLoginController@logout')->name('physician.logout');

Route::group(['middleware'=>'physician'], function() {
    Route::get('/physician/home', 'physician\HomeController@index');
});

Route::get('/nurse/login', 'Auth\nurseLoginController@showLoginForm')->name('nurse.login');
Route::post('/nurse/login', 'Auth\nurseLoginController@login')->name('nurse.login.post');
Route::post('/nurse/logout', 'Auth\nurseLoginController@logout')->name('nurse.logout');

Route::group(['middleware'=>'nurse'], function() {
    Route::get('/nurse/home', 'nurse\HomeController@index');
});


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

Route::post('createAvailability', function() {
    return view('createAvailability');
})->name('createAvailability');

Route::get('/addAppointmentToCart/{appointment}', 'BookAppointmentsController@addAppointmentToCart')->name('appointment.addToCart');
Route::get('/removeAppointmentFromCart{appointment}','BookAppointmentsController@removeAppointmentFromCart')->name('appointment.removeFromCart');
Route::get('/cancelTransaction','BookAppointmentsController@cancelTransaction')->name('appointment.cancelTransaction');
Route::get('/cancelAppointment','BookAppointmentsController@cancelAppointment')->name('appointment.cancelAppointment');
Route::get('/checkoutCart','BookAppointmentsController@checkoutCart')->name('appointment.checkoutCart');
Route::get('/updateAppointment{appointment}','BookAppointmentsController@updateAppointment')->name('appointment.updateAppointment');

