<?php

use App\Http\Controllers\BasicInfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialLinkController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Public routes
Route::get('/', [FrontPageController::class, 'show'])->name('front-page');

// /Admin routes
Route::middleware('auth')->prefix('/admin')->group(function () {
    //Dashboard
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Basic Info
    Route::get('info', [BasicInfoController::class, 'index'])->name('info');
    Route::post('info', [BasicInfoController::class, 'update'])->name('info.update');
    //Categories
    Route::resource('categories', CategoryController::class)->except('show');
    //Products
    Route::resource('products', ProductController::class)->except('show');
    //Social Links
    Route::resource('social-links', SocialLinkController::class)->except('show');
});

require __DIR__.'/auth.php';
