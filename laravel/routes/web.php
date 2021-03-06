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

// ホーム画面
Route::get('/', 'HomeController@index')->name('index');
Route::get('/index', 'HomeController@index')->name('index');
// ゲストログイン
Route::get('guest_login', 'Auth\LoginController@guest_login')->name('login.guest_login');
// マイページ
Route::get('/my_page', 'CarController@history')->name('history');
// ユーザーが提供した画像
Route::get('/my_image', 'CarController@my_image')->name('my_image');
Route::post('/my_image', 'CarController@delete_post_image')->name('delete_post_image');
// ユーザー情報編集
Route::get('/edit', 'UserController@edit')->name('edit');
Route::post('/edit', 'UserController@editValidates')->name('editValidates');
// お気に入り一覧
Route::get('/favorite', 'CarController@favorite')->name('favorite');
// サイト詳細
Route::get('/about', 'HomeController@about')->name('about');
// 車検索
Route::get('/main', 'HomeController@main')->name('main');
// 車検索結果
Route::get('/result', 'CarController@result')->name('result');
// 車の画像提供
Route::get('/post_car', 'CarController@post_car')->name('post_car');
Route::post('/post_car', 'CarController@create')->name('create');
// お気に入り
Route::put('/{car}/like', 'CarController@like')->name('like');
Route::delete('/{car}/like', 'CarController@unlike')->name('unlike');
// 通報
Route::put('/{car_image}/report', 'CarController@report')->name('report');
Route::delete('/{car_image}/report', 'CarController@unreport')->name('unreport');
// news
Route::get('/news', 'NewsController@news')->name('news');
