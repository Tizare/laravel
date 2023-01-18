<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\NewsCategoryController;

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
});

Route::get('/hello/{name}', static function(string $name): string {
    return "Дорогой, {$name}, добро пожаловать на наш сайт!";
});

Route::get('/news', [NewsController::class, 'index'])
->name('news');

Route::get('/news/{id}/show', [NewsController::class, 'show'])
->where('id', '\d+')
->name('news.show');

Route::get('/news/category', [NewsCategoryController::class, 'index'])
->name('category');

Route::get('/news/category/{id}', [NewsCategoryController::class, 'show'])
->name('category.show', '\d+');

Route::get('/about', function () {
    return view('about');
});