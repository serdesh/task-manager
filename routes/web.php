<?php

use Illuminate\Support\Facades\Auth;
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

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\TaskController@home')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');
    Route::get('map', function () {
        return view('pages.maps');
    })->name('map');
    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');
    Route::get('table-list', function () {
        return view('pages.tables');
    })->name('table');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks');

Route::get('task', ['as' => 'task.edit', 'uses' => 'App\Http\Controllers\TaskController@edit']);
Route::put('task', ['as' => 'task.update', 'uses' => 'App\Http\Controllers\TaskController@update']);

Route::get('/customers', 'App\Http\Controllers\CustomerController@index')->name('customers');

Route::get('customer/add', ['as' => 'customer.create', 'uses' => 'App\Http\Controllers\CustomerController@create']);
Route::get('customer/update', ['as' => 'customer.edit', 'uses' => 'App\Http\Controllers\CustomerController@edit']);
Route::put('customer/update', ['as' => 'customer.update', 'uses' => 'App\Http\Controllers\CustomerController@update']);

Route::get('/projects', 'App\Http\Controllers\ProjectController@index')->name('projects');

