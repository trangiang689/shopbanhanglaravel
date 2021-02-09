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
//fontend
Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/trang-chu','App\Http\Controllers\HomeController@index' );

//backend
Route::get('/admin-login','App\Http\Controllers\AdminController@index');

Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::group(['prefix'=>'admin', 'as' => 'admin.'],function (){
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('menus', \App\Http\Controllers\MenuController::class);
    Route::resource('brands', \App\Http\Controllers\BrandController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);


});
