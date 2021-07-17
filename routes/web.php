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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'PlayersController@index');
Route::get('/index', 'PlayersController@index');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('login/{provider}')->where(['provider' => '(line|google)'])->group(function(){
    Route::get('/', 'Auth\LoginController@redirectToProvider')->name('social_login.redirect');
    Route::get('/callback', 'Auth\LoginController@handleProviderCallback')->name('social_login.callback');

});
