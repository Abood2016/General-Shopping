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


Route::get('/', function () {
    return view('welcome');
});



Route::get('email-test', function(){
    return 'hello';
})->middleware(['auth', 'user_is_support', 'user_is_admin']);


// To Import unit data to db
// Route::get('unit-test' , 'DataImportController@importUnits');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
