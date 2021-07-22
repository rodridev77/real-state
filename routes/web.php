<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SearchClientController;
use App\Http\Controllers\CeoController;
use App\Http\Controllers\SearchPropertyController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get( 'auth/login', [LoginController::class, 'index'])->name('login');
Route::post( '/authenticate', [LoginController::class, 'authenticate']);
Route::get( '/search/property', [SearchPropertyController::class, 'search']);
Route::get( '/home/loadmore', [HomeController::class, 'loadMore']);

//Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/dashboard/clients', ClientController::class);
    Route::resource('/dashboard/users', UserController::class);
    Route::resource('/dashboard/properties', PropertyController::class);

    Route::patch('/dashboard/properties/approve-sale', [SaleController::class, 'approve']);
    Route::resource('/dashboard/sales', SaleController::class);
    Route::get('/dashboard/ceo', [CeoController::class, 'index']);
    Route::post('/dashboard/search-client', [SearchClientController::class, 'search']);
    Route::get( '/logout', [LoginController::class, 'logout'])->name('logout');
});