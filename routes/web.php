<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\ShipmentRateController;
use App\Http\Controllers\WeightRateController;
use App\Http\Controllers\ShipmentCalculatorController;
use App\Http\Controllers\CurrencyRateController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\CommodityController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index']);


Route::resource('vendors', VendorController::class);
Route::resource('shipments', ShipmentController::class);
Route::resource('charges', ChargeController::class);
Route::resource('airlines', AirlineController::class);
Route::resource('commodities', CommodityController::class);

Route::resource('shipment_rates', ShipmentRateController::class);
Route::resource('shipment_rates.charges', ChargeController::class)->except(['show']);
Route::resource('weight_rates', WeightRateController::class);

Route::get('/shipment-calculator', [ShipmentCalculatorController::class, 'index'])->name('shipment_calculator.index');
Route::post('/shipment-calculator', [ShipmentCalculatorController::class, 'calculate'])->name('shipment_calculator.calculate');

Route::resource('currencies', CurrencyRateController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
