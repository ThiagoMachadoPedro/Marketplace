<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;


// Registro do Middleware na rota
Route::middleware([Admin::class])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
        ->middleware(['auth'])
        ->name('admin.dashboard');
});
// ver perfil admin
Route::get('admin/profile', [ProfileController::class , 'index'])
->middleware([Admin::class])
->name('admin.profile');


// atualizar o perfil admin
Route::post('admin/profile/update', [ProfileController::class , 'update'])
->middleware([Admin::class])
->name('admin.profile.update');

// atualizar o perfil a senha
Route::post('admin/profile/update/password', [ProfileController::class , 'updatePassword'])
->middleware([Admin::class])
->name('admin.profile.password');


// Rota slider
Route::resource('admin/slider', SliderController::class )
    ->middleware([Admin::class]);
Route::get('sliders/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
Route::put('sliders/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('sliders/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');



// admin categoria
Route::resource('admin/categoria', CategoryController::class )
    ->middleware([Admin::class]);

    // admin categoria filhas
Route::resource('admin/subcategoria', SubCategoryController::class )
    ->middleware([Admin::class]);
