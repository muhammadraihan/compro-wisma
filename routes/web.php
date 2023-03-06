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

Route::group(['prefix' => '/'], function () {
    Route::view('/', 'FrontendController', 'pages.home')->name('home');
    Route::view('/order', 'pages.order')->name('order');
    Route::get('/', 'FrontendController@index')->name('home');
    Route::get('/wisma/{uuid}', 'FrontendController@wisma')->name('wisma');
    Route::get('/about', 'FrontendController@about')->name('about');
    Route::get('/tipe-wisma', 'FrontendController@tipeWisma')->name('tipe-wisma');
    Route::get('/kamar', 'FrontendController@kamar')->name('kamar');
    Route::get('/gallery', 'FrontendController@gallery')->name('gallery');
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
