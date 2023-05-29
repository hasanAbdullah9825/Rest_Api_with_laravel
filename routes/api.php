<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\TestController;
//use App\Http\Controllers\Api\V1\InvoiceController;
//use App\Http\Controllers\Api\V1\CustomerController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::apiResource('customers', App\Http\Controllers\Api\V1\CustomerController::class);
    Route::apiResource('invoices', App\Http\Controllers\Api\V1\InvoiceController::class);
    Route::post('invoices/bulk',[App\Http\Controllers\Api\V1\InvoiceController::class,'bulkStore']);
});
