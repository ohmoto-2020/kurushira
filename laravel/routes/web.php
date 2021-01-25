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

// Route::get('/', function () {
//     return view('page.index');
// });

# ユーザー新規登録、ログイン、ログアウト
Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/index', 'HomeController@index')->name('index');
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');
Route::get('/my_page', 'HomeController@my_page')->name('my_page');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/main', 'HomeController@main')->name('main');
Route::get('/share', 'HomeController@share')->name('share');
Route::post('/result', 'HomeController@result')->name('result');
