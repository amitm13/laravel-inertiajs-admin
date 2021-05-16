<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    Route::resource('roles', 'App\Http\Controllers\Admin\RoleController');
    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('posts', 'App\Http\Controllers\Admin\PostController');
});