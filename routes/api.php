<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/products', [ProductController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Protected Routes (User)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // CART
    Route::post('/add-cart/{id}', [HomeController::class, 'add_cart']);
    Route::get('/cart', [HomeController::class, 'mycart']);
    Route::delete('/cart/{id}', [HomeController::class, 'delete_cart']);

    // ORDERS
    Route::post('/order', [HomeController::class, 'confirm_order']);
    Route::get('/orders', [HomeController::class, 'myorders']);
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum'])->group(function () {

    // CATEGORY
    Route::get('/categories', [AdminController::class, 'view_category']);
    Route::post('/categories', [AdminController::class, 'add_category']);
    Route::delete('/categories/{id}', [AdminController::class, 'delete_category']);
    Route::put('/categories/{id}', [AdminController::class, 'update_category']);

    // PRODUCT
    Route::post('/products', [AdminController::class, 'upload_product']);
    Route::get('/admin-products', [AdminController::class, 'view_product']);
    Route::delete('/products/{id}', [AdminController::class, 'delete_product']);
    Route::post('/products/{id}', [AdminController::class, 'edit_product']);

    // ORDERS
    Route::get('/all-orders', [AdminController::class, 'view_order']);
    Route::post('/order-on-the-way/{id}', [AdminController::class, 'on_the_way']);
    Route::post('/order-delivered/{id}', [AdminController::class, 'delivered']);
});
