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

Route::get('/','ShopController@index')->name('2nds');


//------------------------------------------------------------------------------------
Auth::routes();

Route::get('/home', 'admin\HomeController@index')->name('home');

//------------------------------------------------------------------------------------
Route::group([
    'namespace' => 'admin',
    'prefix' => 'admin',
    'middleware'=>'auth'
], function (){
    Route::get('/', 'DashboardController@index')->name('backend.dashboard');
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', 'ProductController@index')->name('backend.product.index');
        Route::get('/create', 'ProductController@create')->name('backend.product.create');

        Route::post('/store', 'ProductController@store')->name('backend.product.store');
        Route::post('/update/{id}', 'ProductController@update')->name('backend.product.update');
        Route::post('/destroy/{id}', 'ProductController@destroy')->name('backend.product.destroy');
        Route::get('/edit/{id}', 'ProductController@edit')->name('backend.product.edit');

        Route::get('/{id}', 'ProductController@show')->name('backend.product.show');
    });
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');

        Route::post('/store', 'UserController@store')->name('backend.user.store');
        Route::post('/update/{id}', 'UserController@update')->name('backend.user.update');
        Route::post('/destroy/{id}', 'UserController@destroy')->name('backend.user.destroy');
        Route::get('/edit/{id}', 'UserController@edit')->name('backend.user.edit');

        Route::get('/{user_id}', 'UserController@show')->name('backend.user.show');
    });
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', 'CategoryController@index')->name('backend.category.index');
        Route::get('/create', 'CategoryController@create')->name('backend.category.create');
        Route::post('/store', 'CategoryController@store')->name('backend.category.store');
        Route::post('/update/{id}', 'CategoryController@update')->name('backend.category.update');
        Route::post('/destroy/{id}', 'CategoryController@destroy')->name('backend.category.destroy');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('backend.category.edit');
        Route::get('/show/{id}', 'CategoryController@show')->name('backend.category.show');
        Route::get('/{id}', 'CategoryController@show')->name('backend.category.show');
    });
});
