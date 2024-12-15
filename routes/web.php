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

// 会員登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// トップページの画面表示
Route::get('/', 'UsersController@index')->name('top');

// ログイン認証後
Route::group(['middleware' => 'auth'], function () {
    // メールリスト一覧と削除
    Route::prefix('mail-list')->group(function () {
        Route::get('/', 'MailListController@index')->name('mail-list.index');
        Route::delete('/{id}', 'MailListController@destroy')->name('mail-list.destroy');
    });
    // CSVアップロードフォームと処理
    Route::prefix('mail-list/upload')->group(function () {
        Route::get('', 'MailListController@showUploadForm')->name('mail-list.upload.form');
        Route::post('', 'MailListController@upload')->name('mail-list.upload');
    });
});