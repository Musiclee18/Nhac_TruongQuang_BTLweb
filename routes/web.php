<?php

use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\NickController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VideoController;
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

Route::get('/', [IndexController::class,'home']);
Route::get('/dich_vu', [IndexController::class,'dichvu'])->name('dichvu');
Route::get('/dich_vu/{slug}', [IndexController::class,'dichvucon'])->name('dichvucon');
Route::get('/danh-muc-game/{slug}', [IndexController::class,'danhmuc_game'])->name('danhmucgame');
Route::get('/danh-muc/{slug}', [IndexController::class,'danhmuccon'])->name('danhmuccon');
Route::get('/video-highlight', [IndexController::class,'video_highlight'])->name('video-highlight');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/category', CategoryController::class);

// Route::resource('/wheel', WheelController::class);

Route::resource('/slider', SliderController::class);

Route::resource('/blog', BlogController::class);

Route::resource('/video', VideoController::class);

Route::resource('/accessories', AccessoriesController::class);

Route::resource('/nick', NickController::class);

Route::post('/choose_category', [NickController::class, 'choose_category'])->name('choose_category');


