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
    // メールテンプレート作成フォームと保存処理
    Route::prefix('mail-template')->group(function () {
        Route::get('/', 'MailTemplateController@index')->name('mail-template.index'); // 一覧表示
        Route::get('create', 'MailTemplateController@create')->name('mail-template.create'); // 作成フォーム
        Route::post('store', 'MailTemplateController@store')->name('mail-template.store');   // 作成保存
        Route::get('edit/{id}', 'MailTemplateController@edit')->name('mail-template.edit');  // 編集フォーム
        Route::post('update/{id}', 'MailTemplateController@update')->name('mail-template.update'); // 更新処理
        Route::delete('mail-template/{id}', 'MailTemplateController@destroy')->name('mail-template.destroy'); // 削除処理
        Route::get('{id}', 'MailTemplateController@show')->name('mail-template.show'); // 詳細表示
    });
});