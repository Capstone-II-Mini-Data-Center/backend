<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProxmoxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManageOrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportExportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function (){
   return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
Route::post('/packages', [PackageController::class, 'store'])->name('packages.store');
Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('packages.edit');
Route::put('/packages/{id}', [PackageController::class, 'update'])->name('packages.update');
Route::delete('/packages/{id}', [PackageController::class, 'destroy'])->name('packages.destroy');
Route::get('/packages/search', [PackageController::class, 'search'])->name('packages.search');
Route::get('/packages/filterByRecommended', [PackageController::class, 'filterByRecommended'])->name('packages.filterByRecommended');
Route::get('/packages/filterByPriceRange', [PackageController::class, 'filterByPriceRange'])->name('packages.filterByPriceRange');
Route::get('/packages/{package}', [PackageController::class, 'show'])->name('packages.show');


Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
Route::put('/banners/{id}', [BannerController::class, 'update'])->name('banners.update');
Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('banners.destroy');
Route::get('/banners/{banner}', [BannerController::class, 'show'])->name('banners.show');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{userId}', [UserController::class, 'show'])->name('users.show');


Route::get('/orders', [ManageOrderController::class, 'index'])->name('orders.index');
Route::put('/orders/{orderDetail}/updateStatus',[ManageOrderController::class, 'updateStatus'])->name('orders.update-status');
Route::get('/orders/reset-filters', [ManageOrderController::class, 'resetFilters'])->name('orders.reset-filters');


// Route::put('/orders/{orderId}/update-status', [ManageOrderController::class, 'updateStatus'])->name('orders.update-status');
Route::get('/orders/{orderId}', [ManageOrderController::class, 'show'])->name('orders.show');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/dashboard/revenue', [DashboardController::class, 'getTotalRevenueChartData'])->name('dashboard.revenue');
// Route::post('/getTotalRevenueChartData', [DashboardController::class, 'getTotalRevenueChartData'])->name('getTotalRevenueChartData');
Route::get('/revenue-data', [DashboardController::class, 'revenueData'])->name('revenue.data');



Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/export/{reportType}', [ReportExportController::class, 'exportCsv'])->name('reports.export');

// Route::get('/email', function () {
//     Mail::to('sreynitsn69@gmail.com')->send(new HostingCredential);
// });
Route::get('/test', function (){
    return view('welcome');
});

Route::get('/container/create', [ProxmoxController::class, 'createContainer'])->name('vm');

Route::post('/container/start/{vmid}', [ProxmoxController::class, 'startContainer']);

Route::post('/container/stop/{vmid}', [ProxmoxController::class, 'stopContainer']);





require __DIR__.'/auth.php';
