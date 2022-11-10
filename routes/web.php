<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\OrderController;

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
    return view('welcome');
});

Route::resource('/products', ProductController::class);

Route::resource('/customers', CustomerController::class);

Route::resource('/issues', IssueController::class);

Route::resource('/orders', OrderController::class);

Route::get('orders/getProductCode/{id}', [App\Http\Controllers\OrderController::class, 'getProductCode']);