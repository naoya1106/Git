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

//初期画面
Route::get('/login', 'UserController@login');

//登録画面
Route::get('/reg', 'UserController@reg');

//ホーム画面へのログイン
Route::post('/enter', 'UserController@enter')->name('enter');

//ユーザー情報の登録
Route::post('/store', 'UserController@store');
