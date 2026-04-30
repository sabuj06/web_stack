<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;

// Public Routes
Route::get('/',         [PageController::class, 'home'])->name('home');
Route::get('/about',    [PageController::class, 'about'])->name('about');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/contact',  [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',          [AdminController::class, 'dashboard'])->name('dashboard');
    Route::delete('/contacts/{id}',   [AdminController::class, 'deleteContact'])->name('contacts.delete');

    // Products
    Route::get('/products',           [AdminController::class, 'products'])->name('products');
    Route::get('/products/create',    [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products',          [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{id}',      [AdminController::class, 'updateProduct'])->name('products.update');

    Route::get('/products-page',  [AdminController::class, 'editProductsPage'])->name('productspage');
    Route::post('/products-page', [AdminController::class, 'updateProductsPage'])->name('productspage.update');

    // About
    Route::get('/about',[AdminController::class, 'editAbout'])->name('about');
    Route::post('/about',[AdminController::class, 'updateAbout'])->name('about.update');

    // Core Values
    Route::post('/core-values',       [AdminController::class, 'storeCoreValue'])->name('corevalues.store');
    Route::put('/core-values/{id}',   [AdminController::class, 'updateCoreValue'])->name('corevalues.update');
    Route::delete('/core-values/{id}',[AdminController::class, 'deleteCoreValue'])->name('corevalues.delete');
});