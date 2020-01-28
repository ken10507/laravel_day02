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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'TestController@index')->name('test');

// チームのルーティング作成
// チーム一覧
Route::get('/teams', 'TeamController@index')->name('teams');

// チーム詳細
Route::get('/team/{id}', 'TeamController@show');

// チーム作成
Route::post('/team/store', 'TeamController@store');

// チーム参加
Route::post('/team/join', 'TeamController@join');

// チーム編集
Route::post('/team/edit', 'TeamController@edit');

// Ajax
Route::post('/ajax', 'HomeController@ajax');
