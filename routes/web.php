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
    Route::get('setting/create', 'add')->name('setting.add');
    Route::get('setting/update', 'edit')->name('setting.edit');
    Route::get('setting/index', 'index')->name('setting.index');
    // 一覧 
    Route::post('setting/create', 'create')->name('setting.create');
    Route::post('setting/update', 'edit')->name('setting.edit');
    // 保存 
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\Admin\RecordController;
Route::controller(RecordController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('record/create', 'add')->name('record.add');
    Route::get('record/update', 'edit')->name('record.edit');
    Route::get('record/index', 'index')->name('record.index');
    // 一覧 
    Route::post('record/create', 'create')->name('record.create');
    // 保存 
    //

});

use App\Http\Controllers\Admin\HappybirthdayController;
Route::controller(HappybirthdayController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('happybirthday/create', 'add')->middleware('auth');
    Route::get('happybirthday/update', 'edit')->name('happybirthday.edit');
    Route::get('happybirthday/index', 'index')->name('happybirthday.index');
    // 一覧 
    Route::post('happybirthday/create', 'updet')->name('happybirthday.create');
    // 保存 
    //
});