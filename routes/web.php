<?php

use App\Http\Controllers\editController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/Apartment','App\Http\Controllers\apartmentController');
Route::resource('/Apartment/create','App\Http\Controllers\apartmentController');
Route::resource('Apartment.update','App\Http\Controllers\apartmentController');

Route::resource('/Detail','App\Http\Controllers\DetailController');
Route::resource('/Detail/create','App\Http\Controllers\DetailController');

Route::get('/search', 'App\Http\Controllers\searchController@search');

Route::get('/editeProfile', 'App\Http\Controllers\editController@editProfile');
// Route::get('/editApartment', 'App\Http\Controllers\editController@editApartment');
Route::get('/editApartment/{id}',[editController::class,'editApartment']);

//Route::get('/editApartment/editform/{id}',[editController::class,'updateApartment']);