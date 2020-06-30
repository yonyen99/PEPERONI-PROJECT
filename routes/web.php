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
Route::post('checklogin', 'PizzaController@checklogin');
Route::get('successlogin', 'PizzaController@successlogin');
Route::get('successregister', 'PizzaController@successregister');
Route::post('checkregister', 'PizzaController@checkregister');
Route::get('logout', 'PizzaController@logout');
Route::get('signin', 'PizzaController@signin');
Route::get('/formRegister', 'PizzaController@goRegisterForm')->name('formRegister');
Route::post('/create', 'PizzaController@createPizza')->name('createPizza');
Route::get('/delete{id}', 'PizzaController@deletePizza')->name('deletePizza');
Route::patch('/update{id}', 'PizzaController@updatePizza')->name('updatePizza');
