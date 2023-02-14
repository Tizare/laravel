<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\AccountsController as AdminAccountsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SocialProvidersController;
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

Route::group(['middleware'=> 'auth'], static function(){
    Route::get('/account', AccountController::class)
        ->name('account');
    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('account.logout');

    //admin routes
    Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware' => 'is_admin'], static function() {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::get('/parser', ParserController::class)
            ->name('parser');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUsersController::class);
        Route::resource('questions', QuestionsController::class);
    });
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/redirect/{driver}', [SocialProvidersController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.auth.redirect');

    Route::get('/auth/callback/{driver}', [SocialProvidersController::class, 'callback'])
        ->where('driver', '\w+');
});
