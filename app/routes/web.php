<?php

use App\Http\Controllers\Admin\QuestionsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\NewsCategoryController;
use \App\Http\Controllers\Admin\IndexController as AdminController;
use \App\Http\Controllers\Admin\NewsCategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\UsersController as AdminUsersController;

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
    return view('about');
})->name('about');

//admin routes
Route::group(['prefix' => 'admin', 'as'=>'admin.'], static function() {
    Route::get('/', AdminController::class)
    ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('users', AdminUsersController::class);
    Route::resource('questions', QuestionsController::class);
});

//news routes
Route::group(['prefix' => 'news'], static function() {
    Route::get('/', [NewsController::class, 'index'])
    ->name('news');

    Route::get('/{id}/show', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

    Route::get('/category', [NewsCategoryController::class, 'index'])
    ->name('category');

    Route::get('/category/{id}', [NewsCategoryController::class, 'show'])
    ->name('category.show', '\d+');
});

Route::get('/about', function () {
    return view('about');
});
