<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->group( function(){
 
//     Route::post('/userauth', [App\Http\Controllers\UserController::class, 'userauth'])->name('userauth');
  
// });

Route::group([
    'middleware' => ['api', 'cors'],
], function ($router) {
    Route::post('/userauth', [App\Http\Controllers\UserController::class, 'userauth'])->name('userauth');
    Route::post('/uploadresume', [App\Http\Controllers\UserController::class, 'uploadresume'])->name('uploadresume');
});
