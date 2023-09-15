<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function () {
    Route::view('admin_login', 'admin_login')
        ->name('admin.login')
        ->middleware('Auth.Success');

    Route::post('admin_login_validate', [AdminController::class, 'admin_login_validate'])->name('admin.login.store');


    Route::middleware('Auth.Admin')->group(function () {
        Route::get('admin_dashboard', [AdminController::class, 'index'])->name('admin_dashboard');
        Route::get('admin_logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('users', [AdminController::class, 'user'])->name('users');
        Route::prefix('users')->group(function () {
            Route::get('AddUser', [AdminController::class, 'add_user'])->name('users.add');
            Route::post('submitUserData', [AdminController::class, 'storeUser'])->name('users.add.post');
            Route::get('activate/{email}', [AdminController::class, 'user_deactive'])->name('users.deactive');
            Route::get('deactive/{email}', [AdminController::class, 'user_active'])->name('users.activate');
            Route::get('edit/{email}', [AdminController::class, 'user_edit'])->name('users.edit');
            Route::post('update', [AdminController::class, 'user_update'])->name('users.edit.post');
            Route::get('reactive/{email}', [AdminController::class, 'reactive_user'])->name('users.reactive');
            Route::get('user_delete/{email}', [AdminController::class, 'delete_user'])->name('users.delete');
        });
        Route::prefix('products')->group(function () {
            Route::get('available_products', [AdminController::class, 'products_available'])->name('products.available');
            Route::get('add', [AdminController::class, 'product_add'])->name('products.add');
            Route::post('submitData', [AdminController::class, 'products_store'])->name('products.store');
            Route::get('deactivate/{item_name}', [AdminController::class, 'products_deactivate'])->name('products.deactivate');
            Route::get('activate/{item_name}', [AdminController::class, 'products_activate'])->name('products.activate');
            Route::get('reactivate/{item_name}', [AdminController::class, 'products_reactivate'])->name('products.reactivate');
            Route::get('delete/{item_name}', [AdminController::class, 'products_delete'])->name('products.delete');
            Route::get('edit/{item_name}', [AdminController::class, 'products_edit'])->name('products.edit');
            Route::post('update', [AdminController::class, 'products_update'])->name('products.update');
        });

        Route::get('category', [AdminController::class, 'categoryShow'])->name('category');

        Route::prefix('category')->group(function () {
            Route::get('addCategory', [AdminController::class, 'categoryAdd'])->name('category.add');
            Route::post('categoryAddSubmit', [AdminController::class, 'category_store'])->name('category.store');
            Route::get('activate/{name}', [AdminController::class, 'category_activate'])->name('category.activate');
            Route::get('deactivate/{name}', [AdminController::class, 'category_deactivate'])->name('category.deactivate');
            Route::get('reactivate/{name}', [AdminController::class, 'category_reactivate'])->name('category.reactivate');
            Route::get('delete/{name}', [AdminController::class, 'category_delete'])->name('category.delete');
            Route::get('edit/{name}', [AdminController::class, 'category_edit'])->name('category.edit');
            Route::post('update', [AdminController::class, 'category_update'])->name('category.update');
        });

        Route::prefix('services')->group(function () {
            Route::get('Available_Services', [AdminController::class, 'create_services'])->name('services.available');
            Route::get('AddService', [AdminController::class, 'add_services'])->name('services.add');
            Route::post('submitService', [AdminController::class, 'services_store'])->name('service.store');
            Route::get('deactivate/{service_name}', [AdminController::class, 'service_deactivate'])->name('service.deactivate');
            Route::get('activate/{service_name}', [AdminController::class, 'service_activate'])->name('service.activate');
            Route::get('reactivate/{service_name}', [AdminController::class, 'service_reactivate'])->name('service.reactivate');
            Route::get('delete/{service_name}', [AdminController::class, 'service_delete'])->name('service.delete');
            Route::get('edit/{service_name}', [AdminController::class, 'service_edit'])->name('services.edit');
            Route::post('update', [AdminController::class, 'service_update'])->name('services.update');
            Route::get('purchased', [AdminController::class, 'service_purchased'])->name('service.purchased');
        });
        Route::get('edit', [AdminController::class, 'admin_edit'])->name('admin.edit');
        Route::post('update', [AdminController::class, 'admin_update'])->name('admin.update');
        Route::get('change_password', [AdminController::class, 'admin_change_password'])->name('admin.change.password');
        Route::get('change_password_validate', [AdminController::class, 'admin_change_password_validate'])->name('admin.change.password.validate');
    });
});
