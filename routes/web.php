<?php

use Illuminate\Support\Facades\Response;
use App\Category;
use App\Sub_sub_category;

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


Auth::routes();
Route::get('/json_getall', 'ApiController@showAll');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index');
    Route::resource('/product', 'ProductController');
});

Route::resource('/about_us', 'About_us_Controller');

//Route::resource('/product', 'ProductController');

Route::get('/ajax-subcat/', function () {
    $cat_id = \Illuminate\Support\Facades\Input::get('cat_id');
    $s_cat_tbl = new \App\Sub_category();
    $s_category = $s_cat_tbl::where('cat_id', $cat_id)->get();
    return Response::Json($s_category);
});

Route::get('/ajax-subsubcat', function () {
    $s_cat_id = \Illuminate\Support\Facades\Input::get('cat_id');
    $s_s_cat_tbl = new \App\Sub_sub_category();
    $s_s_category = $s_s_cat_tbl::where('sub_cat_id', $s_cat_id)->get();
    return Response::Json($s_s_category);
});