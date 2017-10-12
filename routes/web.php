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
    return view('welcome')->with('categories', App\Category::all())->with('bio', App\Bio::first() ? App\Bio::first() : null)->with('settings', App\Settings::first() ? App\Settings::first() : null)->with('videos', App\Video::all());
});

Route::get('/admin', function(){
	return view('admin')->with('categories', App\Category::all())->with('bio', App\Bio::first() ? App\Bio::first() : null)->with('settings', App\Settings::first() ? App\Settings::first() : null);
});

Route::post('/video/store', ["uses" => "VideosController@store", "as" => "video.store"]);
Route::post('/categories/store', ["uses" => "CategoriesController@store", "as" => "category.store"]);
Route::post('/categories/update/{id}', ["uses" => "CategoriesController@update", "as" => "category.update"]);
Route::post('/categories/delete/{id}', ["uses" => "CategoriesController@delete", "as" => "category.delete"]);
Route::post('/bio/{id}', ["uses" => "BioController@store", "as" => "bio.store"]);
Route::post('/settings', ["uses" => "SettingsController@store", "as" => "settings.store"]);