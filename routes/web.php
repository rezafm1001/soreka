<?php

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
    return view('dashboard');
})->name('home')->middleware('auth');

Route::get('/home', function () {
    return view('dashboard');
})->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController');
    Route::resource('office', 'OfficeController');
    Route::resource('role', 'RoleController');
    Route::get('all', 'OfficeController@all')->name('office.all');

});
Auth::routes([
    'confirm'=>false,
    'register'=>false,
    'reset'=>false,

]);

