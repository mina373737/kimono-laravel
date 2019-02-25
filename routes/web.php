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

Route::group(['prefix'=>'admin'],function(){
  Route::get('products/index','Admin\ProductsController@index');


  Route::get('products/create','Admin\ProductsController@add');
  Route::post('products/create','Admin\ProductsController@create');


  Route::get('products/edit','Admin\ProductsController@edit');
  Route::get('products/update','Admin\ProductsController@update');

  Route::get('products/destroy','Admin\ProductsController@destroy');

  Route::get('lessons/index','Admin\LessonsController@index');
  Route::get('lessons/create','Admin\LessonsController@add');
  Route::get('lessons/edit','Admin\LessonsController@edit');
  Route::get('lessons/update','Admin\LessonsController@update');
  Route::get('lessons/destroy','Admin\LessonsController@destroy');

  Route::get('yukata/index','Admin\YukataController@index');
  Route::get('yukata/create','Admin\YukataController@add');
  Route::get('yukata/edit','Admin\YukataController@edit');
  Route::get('yukata/update','Admin\YukataController@update');
  Route::get('yukata/destroy','Admin\YukataController@destroy');

  Route::get('accessories/index','Admin\AccessoriesController@index');
  Route::get('accessories/create','Admin\AccessoriesController@add');
  Route::get('accessories/edit','Admin\AccessoriesController@edit');
  Route::get('accessories/update','Admin\AccessoriesController@update');
  Route::get('accessories/destroy','Admin\AccessoriesController@destroy');
});
