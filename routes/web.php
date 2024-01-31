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

Route::get('/', function () {
    return view('welcome');
});   
    
use App\Http\Controllers\Admin\NewsController;

Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('news/create','add')->name('news.add');
    Route::post('news/create','create')->name('news.create');
});
   
// ブーストコース　ベーシックタームNo19-4課題実施。
use App\Http\Controllers\Admin\ProfileController;

Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->group(function(){ 
    Route::get('profile/create','add')->middleware('auth');
    Route::post('profile/create','create')->name('profile.create');
    Route::get('profile/edit','edit')->middleware('auth');
    Route::post('profile/edit','update')->name('profile.update');
});

//No19-3課題実施
//Route::get('XXX','AAAController@bbb');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
