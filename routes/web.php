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
    Route::post('units', 'UnitController@store')->name('unit.store');
    Route::delete('units', 'UnitController@delete')->name('unit.delete');
    Route::put('units', 'UnitController@update')->name('unit.update');
    Route::post('search-units', 'UnitController@search')->name('unit.search');
    
    //categories
    Route::get('categories', 'CategoryController@index')->name('categories');

    //products
    Route::get('products', 'ProductController@index')->name('products');

    //tags
    Route::get('tags', 'TagController@index')->name('tags');
    Route::post('tags', 'TagController@store')->name('tag.store');
    Route::post('tags-search', 'TagController@search')->name('tag.search');
    Route::put('units', 'TagController@update')->name('tag.update');
    Route::delete('tags', 'TagController@delete')->name('tag.delete');

    //payments
    //orders
    //shipment

    //countries
    Route::get('countries', 'CountryController@index')->name('coutries');


    //cities
    Route::get('cities', 'CityController@index')->name('cities');

    //states
    Route::get('states', 'StateController@index')->name('states');

    //reviews
    Route::get('reviews', 'ReviewController@index')->name('reviews');
    
    //roles
    Route::get('roles' , 'RoleController@index')->name('roles');

    //tickits
    Route::get('tickets' , 'TicketController@index')->name('tickets');

});


// To Import unit data to db
// Route::get('unit-test' , 'DataImportController@importUnits');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
