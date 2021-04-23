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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'editProduct']);

// Cart
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'addToCart']);
Route::post('/cart/update', [\App\Http\Controllers\CartController::class, 'updateCart']);
Route::post('/cart/delete', [\App\Http\Controllers\CartController::class, 'deleteFromCart']);

Auth::routes();

Route::prefix('user')->name('user.')->group(function() {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'user.is_admin'])->group(function () {
//    Front page
    Route::get('/', function() {
        return redirect('/admin/statistics');
    })->name('index');

    Route::get('/statistics', [App\Http\Controllers\AdminController::class, 'statistics'])->name('statistics');

    Route::prefix('categories')->name('category.')->group(function() {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'categories'])->name('index');
        Route::match(['get', 'post'], '/edit/{category?}', [\App\Http\Controllers\CategoryController::class, 'editCategory'])->name('edit');
        Route::get('/delete/{category}', [\App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('delete');
    });
    Route::prefix('brands')->name('brand.')->group(function() {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'brands'])->name('index');
        Route::match(['get', 'post'], '/edit/{brand?}', [\App\Http\Controllers\BrandController::class, 'editBrand'])->name('edit');
        Route::get('/delete/{brand}', [\App\Http\Controllers\BrandController::class, 'deleteBrand'])->name('delete');
    });
    Route::prefix('products')->name('product.')->group(function() {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'products'])->name('index');
        Route::match(['get', 'post'], '/edit/{product?}', [\App\Http\Controllers\ProductController::class, 'editProduct'])->name('edit');
        Route::get('/delete/{product}', [\App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('delete');
    });
    Route::prefix('customers')->name('customer.')->group(function() {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'customers'])->name('index');
    });


});
