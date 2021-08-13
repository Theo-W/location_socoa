<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer_create');
    Route::post('/customer/create', [CustomerController::class, 'store'])->name('customer_create_store');
    Route::get('/customer/edit/{slug}/{id}', [CustomerController::class, 'edit'])->name('customer_edit');
    Route::post('/customer/edit/{id}', [CustomerController::class, 'storeEdit'])->name('customer_edit_store');
    Route::delete('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer_delete');
});
Route::middleware('auth')->prefix('reservation')->group(function () {
    Route::get('/customer', [ReservationController::class, 'index'])->name('reservation');
});
Route::middleware('auth')->prefix('customer')->group(function () {
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
});
