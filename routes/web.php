<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/manage/packages', [PackageController::class, 'index'])->name('manage_package.index');
Route::get('/manage/packages/create', [PackageController::class, 'create'])->name('manage_package.create');
Route::post('/manage/packages', [PackageController::class, 'store'])->name('manage_package.store');
Route::get('/manage/packages/{id}/edit', [PackageController::class, 'edit'])->name('manage_package.edit');
Route::put('/manage/packages/{id}', [PackageController::class, 'update'])->name('manage_package.update');
Route::delete('/manage/packages/{id}', [PackageController::class, 'destroy'])->name('manage_package.destroy');

Route::get('/manage/banners', [BannerController::class, 'index'])->name('manage_banner.index');
Route::get('/manage/banners/create', [BannerController::class, 'create'])->name('manage_banner.create');
Route::post('/manage/banners', [BannerController::class, 'store'])->name('manage_banner.store');
Route::get('/manage/banners/{id}/edit', [BannerController::class, 'edit'])->name('manage_banner.edit');
Route::put('/manage/banners/{id}', [BannerController::class, 'update'])->name('manage_banner.update');
Route::delete('/manage/banners/{id}', [BannerController::class, 'destroy'])->name('manage_banner.destroy');




require __DIR__.'/auth.php';