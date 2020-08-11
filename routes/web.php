<?php

use Illuminate\Routing\Router;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UsersController@show')->name('users');
Route::group([
    'middleware' => 'auth',
    'prefix' => 'profile/{id}',
    'where' =>['id' => '[0-9]+'],
], function (Router $router) {
    $router->get('/', 'ProfileController@show')->name('profile');
    $router->put('/','ProfileController@update')->name('editProfile');
});
