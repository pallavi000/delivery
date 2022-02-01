<?php

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
    return view('welcome');
});

Auth::routes();


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('area',App\Http\Controllers\AreaController::class);
    Route::resource('company',App\Http\Controllers\CompanyController::class);
    Route::resource('vehicle',App\Http\Controllers\VehicleController::class);
    Route::resource('driver',App\Http\Controllers\DriverController::class);
    Route::resource('dealer',App\Http\Controllers\DealerController::class);
    Route::resource('delivery-order',App\Http\Controllers\DeliveryOrderController::class);
    Route::resource('daily-order',App\Http\Controllers\DailyOrderController::class);
    Route::resource('invoice',App\Http\Controllers\InvoiceController::class);





});
