<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoriaFilhoController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\MarcaController;
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
Route::get('admin/profile', [ProfileController::class, 'index'])
    ->middleware([Admin::class])
    ->name('admin.profile');


// atualizar o perfil admin
Route::post('admin/profile/update', [ProfileController::class, 'update'])
    ->middleware([Admin::class])
    ->name('admin.profile.update');

// atualizar o perfil a senha
Route::post('admin/profile/update/password', [ProfileController::class, 'updatePassword'])
    ->middleware([Admin::class])
    ->name('admin.profile.password');


// Rota slider
Route::resource('admin/slider', SliderController::class)
    ->middleware([Admin::class]);
Route::get('sliders/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
Route::put('sliders/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('sliders/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');



// admin categoria
Route::post('/categoria/toggle-status', [CategoryController::class, 'toggleStatus'])->name('categoria.toggleStatus');
Route::resource('admin/categoria', CategoryController::class)
    ->middleware([Admin::class]);

// admin sub categoria
Route::post('/subcategoria/toggle-status', [SubCategoryController::class, 'toggleStatus'])->name('subcategoria.toggleStatus');
Route::resource('admin/subcategoria', SubCategoryController::class)
    ->middleware([Admin::class]);


// admin sub categoria filha
Route::post('/categoriafilho/toggle-status', [CategoriaFilhoController::class, 'toggleStatus'])->name('categoriafilho.toggleStatus');
Route::resource('admin/categoria-filho', CategoriaFilhoController::class)
    ->middleware([Admin::class]);


    // busca com javascript uma subcategoria atualizar automatico, quando selecionado a opão a outra carrega automaticamente na tela
Route::get('get-subcategorias', [CategoriaFilhoController::class, 'getSubCategorias'])->name('get-subcategorias');


// admin marca
Route::post('/marca/toggle-status', [MarcaController::class, 'toggleStatus'])->name('marca.toggleStatus');

Route::resource('admin/marcas', MarcaController::class)
    ->middleware([Admin::class]);
