<?php

use App\Http\Controllers\Frontend\siteController;
use App\View\Components\SinglePost;
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

Route::get('/',[siteController::class, 'name'])->name('index');
Route::get('/post',[siteController::class,'singlepost']);

// user section
Route::prefix('/user')->name('user.')->group(function (){
    Route::get('/register',[siteController::class,'registerform'])->name('registerform');
    Route::post('/registers',[siteController::class,'registration'])->name('registration');
    Route::get('/login',[siteController::class,'loginform'])->name('loginform');
    Route::post('/logins',[siteController::class,'login'])->name('login');
    Route::get('/logout',[siteController::class,'logout'])->name('logout');
});

