<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Middleware\Vendor;
use Illuminate\Support\Facades\Route;



    Route::middleware([Vendor::class])->group(function () {
    Route::get('vendor/dashboard', [VendorController::class, 'dashboard'])
        ->middleware(['auth'])
        ->name('vendor.dashboard');
});
