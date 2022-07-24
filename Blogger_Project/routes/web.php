<?php

use Illuminate\Support\Facades\Route;
use App\Articals_Package\Presentation\Controllers\Website\IndexController;
use App\Articals_Package\Presentation\Controllers\Website\AuthController;
use App\Articals_Package\Presentation\Controllers\Website\BlogDetailsController;



Route::get('/auth', [AuthController::class, 'index'])->name('auth');
Route::post('/register', [AuthController::class, 'register'])->name('postRegister');
Route::post('/login', [AuthController::class, 'login'])->name('postLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/ajax/getFilterArticals', [IndexController::class, 'getFilterArticals'])->name('filterArticals');

Route::get('/blog/{id}', [BlogDetailsController::class, 'index'])->name('blogDetails');
Route::post('/ajax/comment', [BlogDetailsController::class, 'postComment'])->name('postComment');

});


