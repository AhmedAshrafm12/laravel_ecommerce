<?php

use App\Http\Controllers\Admin\frontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\dashboardContrller;
use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\favController;
use App\Http\Controllers\front\frontController;
use App\Http\Controllers\langController;
use App\Http\Controllers\ordersConrtroller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductsController;
use App\Models\categorie;

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

Route::get('/',[frontController::class, 'index']);
Route::get('/home',[frontController::class, 'home']);
Route::get('/AllCategories',[frontController::class, 'category']);
Route::get('/view-products/{slug}',[frontController::class, 'viewProducts']);
Route::get('/product-details/{id}',[frontController::class, 'prodcutDetails']);
Route::get('change/{lang}', [langController::class, "lang_change"]);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::resource('category',categoryController::class);
    Route::get('/dashboard', [frontendController::class , "index"]);
    // Route::get('/categories', [categoryController::class , "index"]);
    // Route::post('/insert-cat', [categoryController::class , "insert"]);
    // Route::get('/add-category', [categoryController::class , "add"]);;
    // Route::get('/edit-prod/{id}', [categoryController::class , "edit"]);;
    // Route::post('/update-cat/{id}', [categoryController::class , "update"]);;
    // Route::get('/delete-cat/{id}', [categoryController::class , "destroy"]);;
    Route::get('/products', [ProductsController::class , "index"]);
    Route::get('/add-product', [ProductsController::class , "add"]);;
    Route::post('/insert-product', [ProductsController::class , "store"]);;
    Route::get('/edit-product/{id}', [ProductsController::class , "edit"]);;
    Route::post('/update-product/{id}',[ProductsController::class , 'update']);;
    Route::get('/delete-product/{id}', [ProductsController::class , "destroy"]);;
    Route::get('/orders', [orderController::class , "index"]);
    Route::get('/ordersHistory', [orderController::class , "ordersHistory"]);
    Route::get('orderview/{id}', [orderController::class , "view"]);
    Route::post('/updateOrder/{id}', [orderController::class , "updateOrder"]);
    Route::get('/users', [dashboardContrller::class , "index"]);
    Route::get('userview/{id}', [dashboardContrller::class , "view"]);
});







///

Route::group(['middleware' => ['auth']], function () {
    Route::get('/add-to-cart/{itemId}/{count}', [cartController::class , "store"]);
    Route::get('/add-to-fav/{itemId}', [favController::class , "store"]);
    Route::get('/cart', [cartController::class , "show"]);
    Route::get('/removeCart/{id}', [cartController::class , "remove"]);
    Route::get('/update-cart/{id}/{count}', [cartController::class , "update"]);
    Route::get('/checkOut', [checkoutController::class , "index"]);
    Route::post('/placeOrder', [checkoutController::class , "placeOrder"]);
    Route::get('/my-orders', [ordersConrtroller::class , "index"]);
    Route::get('order-view/{id}', [ordersConrtroller::class , "view"]);
    Route::get('/favs', [favController::class , "show"]);
    Route::get('/removefav/{id}', [favController::class , "remove"]);
    Route::post('/updateuser', [frontController::class , "updateUser"]);

    Route::post('/paypal', [PaymentController::class, 'payWithpaypal'])->name('paypal');

});
