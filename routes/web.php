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



Route::group(['auth','user_is_admin'],function(){

    //units
    Route::get('units', 'UnitController@index')->name('units');
    
    //categories
    Route::get('categories', 'CategoryController@index')->name('categories');

    //products
    Route::get('products', 'ProductController@index')->name('products');

    //tags
    Route::get('tags', 'TagController@index')->name('tags');

    //payments
    //orders
    //shipment

    //countries
    Route::get('countries', 'CountryController@index')->name('coutries');


    //cities
    Route::get('cities', 'CityController@index')->name('cities');

    //states
    Route::get('states', 'StateController@index')->name('states');
    
    //roles
    //reviews
    //tickits

});


// To Import unit data to db
// Route::get('unit-test' , 'DataImportController@importUnits');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
