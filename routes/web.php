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
    return view('auth.login');
});

Auth::routes();
Route::post('checklogin', 'MainController@checklogin');
Route::get('successlogin', 'MainController@successlogin');
Route::post('checkregister', 'MainController@checkregister');
Route::get('logout', 'MainController@logout');
Route::get('/formRegister', 'MainController@goRegisterForm')->name('formRegister');
Route::post('/create', 'MainController@createPizza')->name('createPizza');
Route::get('/delete{id}', 'MainController@deletePizza')->name('deletePizza');
Route::patch('/update{id}', 'MainController@updatePizza')->name('updatePizza');
