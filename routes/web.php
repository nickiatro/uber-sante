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

Route::view('/admin', 'admin');
Route::view('/welcome', 'welcome');
Route::view('/patient-create-appointment','patient-create-appointment');
Route::view('/addToCart', 'addToCart');
Route::get('admin/update/{user}', 'UserController@update')->name('user.update');
Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD
Route::view('/view', 'view');
Route::view('/help', 'help');
Auth::routes();
=======
Route::get('/home', 'HomeController@index')->name('home');

Route::get('createPhysician', 'Auth\CreatePhysicianController@showcreatePhysicianForm')->name('createPhysician');
Route::post('createPhysician', 'Auth\CreatePhysicianController@register');
>>>>>>> dd84ae2ec6e30a1c4c6a2600a95d62e024c73844

Route::get('createNurse', 'Auth\CreateNurseController@showcreateNurseForm')->name('createNurse');
Route::post('createNurse', 'Auth\CreateNurseController@register');