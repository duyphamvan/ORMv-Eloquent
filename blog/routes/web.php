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
Route::group(['prefix'=>'blogs'],function (){
   Route::get('/', 'BlogController@index')->name('index');
   Route::get('{id}/read', 'BlogController@read')->name('read');
   Route::get('/create','BlogController@create')->name('create');
   Route::post('/create','BlogController@store')->name('store');
   Route::get('{id}/edit', 'BlogController@edit')->name('edit');
   Route::post('{id}/update', 'BlogController@update')->name('update');
   Route::get('{id}/delete', 'BlogController@destroy')->name('delete');
   Route::get('/search', 'BlogController@search')->name('search');
   Route::get('/categories/{id}', 'BlogController@filterByCategory')->name('filter');
});

Route::group(['prefix'=>'categories'],function (){
   Route::get('/', 'CategoryController@index')->name('index.ct');
   Route::get('/create','CategoryController@create')->name('create.ct');
   Route::post('/create','CategoryController@store')->name('store.ct');
   Route::get('{id}/edit', 'CategoryController@edit')->name('edit.ct');
   Route::post('{id}/update', 'CategoryController@update')->name('update.ct');
   Route::get('{id}/delete', 'CategoryController@destroy')->name('delete.ct');
});


