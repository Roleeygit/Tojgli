<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
    return view('home');
});

// Route::get('/register', [RegisterController::class, "Register"]);
// Route::post("/submit-customer", [RegisterController::class,"StoreCustomer"]);

// Route::get('/login', [LoginController::class, "Login"]);

// Route::get("/new-product",[ProductController::class,"NewProduct"]);
// Route::post("/submit-product", [ProductController::class,"StoreProduct"]);
// Route::get('/productdata', [ProductController::class, "ProductData"]);

// Route::get('/new-profile', [ProfileController::class, "NewProfile"]);
// Route::get('/profiledata', [ProfileController::class, "ProfilesData"]);
// Route::post('/submit-profile', [ProfileController::class, "StoreProfiles"]);
