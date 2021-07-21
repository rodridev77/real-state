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

    Route::get('/dashboard/clients', [ClientController::class, 'index']);
    Route::get('/dashboard/clients/create', [ClientController::class, 'create']);
    Route::post('/dashboard/clients/store', [ClientController::class, 'store']);
    Route::delete('/dashboard/clients/delete', [ClientController::class, 'delete']);
    Route::get('/dashboard/clients/edit/{id}', [ClientController::class, 'edit']);
    Route::put('/dashboard/clients/update', [ClientController::class, 'update']);

    // Route::get('/dashboard/users', [UserController::class, 'index']);
    // Route::get('/dashboard/users/create', [UserController::class, 'create']);
    // Route::post('/dashboard/users/store', [UserController::class, 'store']);
    // Route::delete('/dashboard/users/delete', [UserController::class, 'delete']);
    // Route::get('/dashboard/users/edit/{id}', [UserController::class, 'edit']);
    // Route::put('/dashboard/users/update', [UserController::class, 'update']);
    Route::resource('/dashboard/users', UserController::class);

    Route::get('/dashboard/properties', [PropertyController::class, 'index']);
    Route::get('/dashboard/properties/create', [PropertyController::class, 'create']);
    Route::post('/dashboard/properties/store', [PropertyController::class, 'store']);
    Route::delete('/dashboard/properties/delete', [PropertyController::class, 'delete']);
    Route::get('/dashboard/properties/edit/{id}', [PropertyController::class, 'edit']);
    Route::put('/dashboard/properties/update', [PropertyController::class, 'update']);

    Route::get('/dashboard/sales', [SaleController::class, 'index']);
    Route::post('/dashboard/sales/store', [SaleController::class, 'store']);
    Route::get('/dashboard/sales/property/{id}', [SaleController::class, 'showSail']);
    Route::post('/dashboard/search-client', [SearchClientController::class, 'search']);
    Route::patch('/dashboard/properties/approve-sale', [SaleController::class, 'approve']);

    Route::get('/dashboard/ceo', [CeoController::class, 'index']);
    Route::get( '/logout', [LoginController::class, 'logout'])->name('logout');
});