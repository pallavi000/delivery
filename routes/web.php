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
    return redirect()->route('login');
});

Auth::routes();


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('destination',App\Http\Controllers\AreaController::class);
    Route::resource('company',App\Http\Controllers\CompanyController::class);
    Route::resource('vehicle',App\Http\Controllers\VehicleController::class);
    Route::resource('driver',App\Http\Controllers\DriverController::class);
    Route::resource('dealer',App\Http\Controllers\DealerController::class);
    Route::resource('delivery-order',App\Http\Controllers\DeliveryOrderController::class);
    Route::resource('daily-order',App\Http\Controllers\DailyOrderController::class);
    Route::resource('invoice',App\Http\Controllers\InvoiceController::class);
    Route::resource('receiver',App\Http\Controllers\ReceiverController::class);
    Route::resource('product',App\Http\Controllers\ProductController::class);
    Route::get('/show-dlv', [App\Http\Controllers\VehicleController::class, 'showDLV'])->name('dlv.show');
    Route::post('/add-to-dlv/{id}', [App\Http\Controllers\VehicleController::class, 'addToDLV'])->name('dlv.add');
    Route::post('/remove-from-dlv/{id}', [App\Http\Controllers\VehicleController::class, 'removeFromDLV'])->name('dlv.remove');
    Route::post('/add-to-dlv-multi}', [App\Http\Controllers\VehicleController::class, 'addToDLVMulti'])->name('dlv.multi.add');
    Route::post('/remove-from-dlv-multi}', [App\Http\Controllers\VehicleController::class, 'removeFromDLVMulti'])->name('dlv.multi.remove');





});
