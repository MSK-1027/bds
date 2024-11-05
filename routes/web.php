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
use App\Http\Controllers\SettingController;
Route::controller(SettingController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('setting/create', 'add')->middleware('auth');
    // ->name('setting.add');??
    Route::get('setting/update', 'edit')->middleware('auth');
    // ->name('setting.edit');??
    Route::get('setting/index', 'index')->middleware('auth');
    // 一覧 ->name('setting.index');??
    Route::post('setting/create', 'updet')->middleware('auth');
    // 保存 ->name('setting.create');??
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\RecordController;
Route::controller(RecordController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('record/create', 'add')->middleware('auth');
    //->name('record.add');
});