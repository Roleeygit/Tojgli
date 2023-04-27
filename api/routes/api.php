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
    Route::put("/updateuser/{id}", [UserController::class,"UpdateUser"]);
    Route::delete("/deleteuser/{id}", [UserController::class,"DeleteUser"]);
    Route::delete("/deleteprofile/{id}", [ProfileController::class,"DeleteProfile"]);
    Route::post("/submit-product", [ProductController::class,"NewProduct"]);
    Route::put("/updateproduct/{id}", [ProductController::class,"UpdateProduct"]);
    Route::post ("/image/{id}", [ProductController::class,"AddImageToProduct"]);
    Route::delete("/deleteproduct/{id}", [ProductController::class,"DeleteProduct"]);
    Route::put("/updateadmin/{id}", [UserController::class,"UpdateAdmin"]);


});    

/* ----------------------------------------------------------------------
|                             User Route                                |
------------------------------------------------------------------------ */


Route::post("/register", [UserController::class, "UserRegister"]);
Route::post("/login", [UserController::class, "UserLogin"]);
Route::post("/logout", [UserController::class, "UserLogout"]);
Route::get("/registeredusers", [UserController::class,"ListUsers"]);
Route::get("/userbyid/{id}", [UserController::class,"ShowUserById"]);


/* ----------------------------------------------------------------------
|                             Product Route                             |
------------------------------------------------------------------------ */


Route::get("/productlist", [ProductController::class,"ProductList"]);
Route::get("ProductById/{id}", [ProductController::class, "ShowProductById"]);
Route::get("/productimg/{id}", [ProductController::class,"GetProductImage"]);
Route::get("/categories", [ProductController::class, "ShowCategory"]);

/* ----------------------------------------------------------------------
|                             Profile Route                             |
------------------------------------------------------------------------ */


Route::get("/profilelist", [ProfileController::class,"ListProfiles"]);
Route::get("/profile/{id}", [ProfileController::class,"ShowProfileById"]);
Route::put("/updateprofile/{id}", [ProfileController::class,"UpdateProfile"]);


/* ----------------------------------------------------------------------
|                             Purchase Route                            |
------------------------------------------------------------------------ */


Route::put("/purchase/{id}", [PurchaseController::class, "Purchase"]);
