<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Homepage
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('foods', ['as' => 'foods.index', 'uses' => 'FoodsController@index']);

// Add food form
Route::get('foods/create', ['as' => 'foods.create', 'uses' => 'FoodsController@create']);

// Create food item
Route::post('foods', ['as' => 'foods.store', 'uses' => 'FoodsController@store']);

// Add day form
Route::get('days/create', ['as' => 'days.create', 'uses' => 'DaysController@create']);

// Edit day form
Route::get('days/{id}/edit', ['as' => 'days.edit', 'uses' => 'DaysController@edit']);

// Create day item
Route::post('days', ['as' => 'days.store', 'uses' => 'DaysController@store']);

// Create food entry
Route::post('foodEntries', ['as' => 'foodEntries.store', 'uses' => 'FoodEntriesController@store']);

Route::put('foodEntries/{id}', ['as' => 'foodEntries.update', 'uses' => 'FoodEntriesController@update']);

// Add serving form
Route::get('servings/create', ['as' => 'servings.create', 'uses' => 'ServingsController@create']);

// Create serving item
Route::post('servings', ['as' => 'servings.store', 'uses' => 'ServingsController@store']);

Route::group(['prefix' => 'api'], function()
{
	Route::get('servings/{id}', ['as' => 'api.servings', 'uses' => 'FoodsController@apiServings']);
});