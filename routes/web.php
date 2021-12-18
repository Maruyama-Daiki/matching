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

Route::get('/', 'TopController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'UsernewsController@index')->middleware('auth');

Route::get('/mypage', 'MypageController@index')->middleware('auth');

Route::get('admin/profile/edit', 'MypageController@edit')->middleware('auth');
Route::post('admin/profile/edit', 'MypageController@update')->middleware('auth');


// matchのページのルーティング
Route::group(['middleware' => 'auth'], function () {
    Route::get('/match', 'UserController@index');
    Route::post('/swipes', 'SwipeController@store')->name('swipes.store');
    
    Route::get('/userprofile', 'UserprofileController@index');
});

// talkのページのルーティング
Route::group(['middleware' => 'auth'], function () {
    Route::get('/talk', 'TalkController@index');
   
});
