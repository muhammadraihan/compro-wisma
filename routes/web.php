<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::prefix('frontend')->name('frontend.')->group(function () {
// Route::view('/home', 'frontend.home');
// });

Route::group(['prefix' => '/'], function () {
    Route::view('/', 'FrontendController','pages.home') -> name('home');
    Route::view('/about', 'pages.about') -> name('about');
    Route::view('/tipe-wisma', 'pages.tipe-wisma') -> name('tipe-wisma');
    Route::view('/wisma-kurnia', 'pages.wisma-kurnia') -> name('wisma-kurnia');
    Route::view('/spbu-batangtoru', 'pages.spbu-batangtoru') -> name('spbu-batangtoru');
    Route::view('/order', 'pages.order') -> name('order');
    Route::get('/', 'FrontendController@index') -> name('home');
    Route::get('/wisma', 'FrontendController@wisma')->name('wisma');
    Route::get('/about', 'FrontendController@about')->name('about');
    Route::get('/kamar/{id}', 'FrontendController@kamar')->name('kamar');
    Route::get('/order/{id}', 'FrontendController@order')->name('order');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'backoffice', 'middleware' => ['auth']], function () {
    // backoffice
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@dashboard')->name('backoffice.dashboard');
    // logs
    Route::get('logs', 'ActivityController@index')->name('logs');
    // profile
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::patch('profile/{user}/update', 'UserController@ProfileUpdate')->name('profile.update');
    Route::patch('profile/{user}/password', 'UserController@ChangePassword')->name('profile.password');
    // resource
    Route::resource('menus', 'MenuController');
    Route::resource('users', 'UserController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('roles', 'RoleController');
    Route::resource('room', 'RoomTypeController');
    Route::resource('wisma', 'WismaController');
    Route::resource('gallery', 'GalleryController');
    Route::resource('about', 'AboutController');
    Route::resource('sosmed', 'SosmedController');
});
