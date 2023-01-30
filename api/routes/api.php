<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;

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

Route::group(["middleware" => ["auth:sanctum"]], function() 
{

});    

/* ----------------------------------------------------------------------
|                             User Route                                |
------------------------------------------------------------------------ */


Route::post("/register", [UserController::class, "UserRegister"]);
Route::post("/login", [UserController::class, "UserLogin"]);
Route::post("/logout", [UserController::class, "UserLogout"]);
Route::get("/registeredusers", [UserController::class,"ListUsers"]);
Route::put("/updateuser/{id}", [UserController::class,"UpdateUser"]);
Route::get("/userbyid/{id}", [UserController::class,"ShowUserById"]);
Route::delete("/deleteuser/{id}", [UserController::class,"DeleteUser"]);


/* ----------------------------------------------------------------------
|                             Product Route                             |
------------------------------------------------------------------------ */


Route::post("/submit-product", [ProductController::class,"NewProduct"]);
Route::get("/productlist", [ProductController::class,"ProductList"]);
Route::put("/updateproduct/{id}", [ProductController::class,"UpdateProduct"]);
Route::delete("/deleteproduct/{id}", [ProductController::class,"DeleteProduct"]);
Route::get("ProductById/{id}", [ProductController::class, "ShowProductById"]);


/* ----------------------------------------------------------------------
|                             Profile Route                             |
------------------------------------------------------------------------ */
Route::get("/profilelist", [ProfileController::class,"ListProfiles"]);
Route::put("/updateprofile/{id}", [ProfileController::class,"UpdateProfile"]);


/* ----------------------------------------------------------------------
|                             Purchase Route                            |
------------------------------------------------------------------------ */


Route::put("/purchase/{id}", [PurchaseController::class, "Purchase"]);
