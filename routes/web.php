<?php

use Illuminate\Support\Facades\Route;

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
// S大文字単数形　    get posts小文字　単数形
use App\Http\Controllers\Admin\SettingController;
Route::controller(SettingController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    //設定登録フォーム表示
    Route::get('setting/create', 'add')->name('setting.add');
    //設定の表示
    Route::get('setting/update', 'edit')->name('setting.edit');
    // Route::get('setting/index', 'index')->name('setting.index');
    // 一覧
    //設定の登録
    Route::post('setting/create', 'create')->name('setting.create');
    //登録の保存
    Route::post('setting/update', 'edit')->name('setting.edit');

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\Admin\RecordController;
Route::controller(RecordController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    //記録の登録の表示
    Route::get('record/create', 'add')->name('record.add');
    //記録の表示
    Route::get('record/update', 'edit')->name('record.edit');
    //記録一覧の表示
    Route::get('record/index', 'index')->name('record.index');
    //記録の保存
    Route::post('record/create', 'create')->name('record.create');

    //

});

use App\Http\Controllers\Admin\HappybirthdayController;
Route::controller(HappybirthdayController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    //誕生日登録の表示
    Route::get('happybirthday/create', 'add')->middleware('auth');
    //登録の表示
    Route::get('happybirthday/update', 'edit')->name('happybirthday.edit');
    //一覧の表示はいりますか？
    Route::get('happybirthday/index', 'index')->name('happybirthday.index');
    // 保存
    Route::post('happybirthday/create', 'updet')->name('happybirthday.create');


});
use App\Http\Controllers\Admin\MypageController;
Route::controller(MypageController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('mypage', 'index')->name('mypage.index');
});
