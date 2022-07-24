<?php

use App\Articals_Package\Data\Models\Artical;
use Illuminate\Support\Facades\Route;
use App\Articals_Package\Presentation\Controllers\Dashboard\AuthController;
use App\Articals_Package\Presentation\Controllers\Dashboard\DashboardController;
use App\Articals_Package\Presentation\Controllers\Dashboard\CategoryController;
use App\Articals_Package\Presentation\Controllers\Dashboard\ArticalController;

//Route::domain('http://127.0.0.1:8000/')->group(function () {



Route::get('auth', [AuthController::class, 'getAuth'])->name('adminAuth');
Route::post('auth', [AuthController::class, 'postLogin'])->name('AuthPost');
Route::get('logout', [AuthController::class, 'logout'])->name('adminLogout');



Route::group(['middleware' => 'adminauth'], function () {





    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('articals', ArticalController::class);
});




//});
