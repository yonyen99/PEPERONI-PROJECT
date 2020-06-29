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

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/formLogoin', 'pizaControllerResource@goToLoginForm')->name('formLogin');
// Route::get('/register', 'pizaControllerResource@register')->name('register');
// Route::get('/main', 'MainController@index');
// Route::post('checkregister', 'MainController@checkregister');
Route::resource('piza','pizaControllerResource');
Route::get('/formRegister', 'pizaControllerResource@goRegisterForm')->name('formRegister');

Route::post('checklogin', 'MainController@checklogin');
Route::post('checkregister', 'MainController@checkregister');

Route::get('successlogin', 'MainController@successlogin');
Route::get('logout', 'MainController@logout');
Route::post('/create', 'MainController@createPizza')->name('createPizza');
Route::get('/delete{id}', 'MainController@deletePizza')->name('deletePizza');
Route::patch('/update{id}', 'MainController@updatePizza')->name('updatePizza');
// Route::post('/store', 'userController@store')->name('store');