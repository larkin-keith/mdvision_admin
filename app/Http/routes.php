<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| 网站页面
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web', 'domain'=>config('domain.admin')], function () {

    Route::auth();
    // 禁止访问redirect
    Route::get('/register', function() { return redirect('/'); });

    Route::get('/', function () {
	    return view('welcome');
	});

    Route::get('/home', 'HomeController@index');

    /*
	|--------------------------------------------------------------------------
	| 后台管理 Routes
	|--------------------------------------------------------------------------
	*/
    // 广告位管理
    Route::group(['prefix' => 'advertisement'], function () {
    	Route::get('/', 'Admin\AdvertisementController@index');
    	Route::get('/create', 'Admin\AdvertisementController@create');
    	Route::post('/store', 'Admin\AdvertisementController@store')->name('advertisement.store');
    	Route::get('/datas', 'Admin\AdvertisementController@datas')->name('advertisement.data');
    	Route::get('/{id}', 'Admin\AdvertisementController@edit');
    	Route::put('/{id}', 'Admin\AdvertisementController@update')->name('advertisement.update');
    	Route::put('/{id}/isEnable', 'Admin\AdvertisementController@isEnableOrDisable');
    	Route::delete('/{id}', 'Admin\AdvertisementController@destroy');
    });

    // 文章管理
    Route::group(['prefix' => 'articles'], function () {
    	Route::get('/', 'Admin\ArticlesController@index');
    	Route::get('/create', 'Admin\ArticlesController@create');
    	Route::post('/store', 'Admin\ArticlesController@store')->name('articles.store');
    	Route::get('/datas', 'Admin\ArticlesController@datas')->name('articles.data');
    	Route::get('/{id}', 'Admin\ArticlesController@edit');
    	Route::put('/{id}', 'Admin\ArticlesController@update')->name('articles.update');
    	Route::delete('/{id}', 'Admin\ArticlesController@destroy');
    });

    // 产品管理
    Route::group(['prefix' => 'products'], function () {
    	Route::get('/', 'Admin\ProductsController@index');
    	Route::get('/create', 'Admin\ProductsController@create');
    	Route::post('/store', 'Admin\ProductsController@store')->name('products.store');
    	Route::get('/datas', 'Admin\ProductsController@datas')->name('products.data');
    	Route::get('/{id}', 'Admin\ProductsController@edit');
    	Route::put('/{id}', 'Admin\ProductsController@update')->name('products.update');
    	Route::delete('/{id}', 'Admin\ProductsController@destroy');
    });

    /*
	|--------------------------------------------------------------------------
	| 公共API管理 Routes
	|--------------------------------------------------------------------------
	*/
    Route::group(['prefix' => 'api'], function () {
    	Route::get('/search/articles', 'Api\SearchController@articles');
        Route::get('/search/products', 'Api\SearchController@products');
    	Route::post('/image/upload', 'Api\CommontController@imageUpload');
    });
});

// Route::group(['middleware' => 'web'], function () {
//     Route::get('/', 'Home\HomeController@index');
// });
