<?php

use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\dashboardController;
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
    Route::post('/logout',[siteController::class,'logout'])->name('logout');
});


// admin section
Route::prefix('/admin')->name('admin.')->group(function (){
    Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard');

    Route::prefix('/category')->name('category.')->group(function(){
        Route::get('/',[categoryController::class,'index'])->name('index');
        Route::get('/create',[categoryController::class,'create'])->name('create');
        Route::post('/store',[categoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[categoryController::class,'edit'])->name('edit');
        Route::get('/single/{id}',[categoryController::class,'show'])->name('show');
        Route::put('/update/{id}',[categoryController::class,'update'])->name('update');
        Route::delete('/{id}',[categoryController::class,'destroy'])->name('destroy');
    });


});
