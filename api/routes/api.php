<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/register", [AuthController::class, "signUp"]);
Route::post("/login", [AuthController::class, "signIn"]);
Route::post("/logout", [AuthController::class, "logOut"]);


/* ----------------------------------------------------------------------
|                             Customer Router                           |
------------------------------------------------------------------------ */
Route::post("/submit-customer", [CustomerController::class,"CustomerRegister"]);
Route::get("/registeredcustomers", [CustomerController::class,"RegisteredCustomerList"]);
Route::get("/updatecustomer/{id}", [CustomerController::class,"UpdateCustomers"]);
Route::delete("/deletecustomer/{id}", [CustomerController::class,"DeleteCustomer"]);


/* ----------------------------------------------------------------------
|                             Product Router                            |
------------------------------------------------------------------------ */
Route::post("/submit-product", [ProductController::class,"NewProduct"]);
Route::get("/productlist", [ProductController::class,"ProductList"]);
Route::get("/updateproduct/{id}", [ProductController::class,"UpdateProduct"]);
Route::delete("/deleteproduct/{id}", [ProductController::class,"DeleteProduct"]);
Route::get("ProductById/{id}", [ProductController::class, "ShowProductById"]);