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
Route::get('guest_login', 'Auth\LoginController@guest_login')->name('login.guest_login');

Route::get('/my_page', 'HomeController@my_page')->name('my_page');
# ユーザー情報編集
Route::get('/edit', 'UserController@edit')->name('edit');
Route::post('/edit', 'UserController@update')->name('update');

Route::get('/about', 'HomeController@about')->name('about');
Route::get('/main', 'HomeController@main')->name('main');


Route::get('/result', 'CarController@result')->name('result');


Route::get('/post_car', 'CarController@post_car')->name('post_car');
