<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\DrugsApplicationController;
use App\Http\Controllers\DrugsCategoryController;
use App\Http\Controllers\VenStatusController;
use App\Http\Controllers\ConsumptionController;
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

Route::prefix('products')->group(function(){
    Route::get('/', [ProductController::class,'index']);
});

Route::prefix('customers')->group(function(){
     Route::get('/', [CustomerController::class,'index']);
});

Route::prefix('zones')->group(function(){
    Route::get('/', [ZoneController::class,'index']);
});

Route::prefix('drugs_application')->group(function(){
    Route::get('/', [DrugsApplicationController::class,'index']);
});

Route::prefix('drugs_categories')->group(function(){
    Route::get('/', [DrugsCategoryController::class,'index']);
});

Route::prefix('ven_status')->group(function(){
    Route::get('/', [VenStatusController::class,'index']);
});

Route::prefix('consumption')->group(function(){
    Route::get('/', [ConsumptionController::class,'index']);
});