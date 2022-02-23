<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TicketController;


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

//Route::apiResource('users',UserController::class)->except('update');
//Route::apiResource('tickets',TicketController::class);

// Route::post('index',[TicketController::class,'doLogin']);

Route::resource('tickets', App\Http\Controllers\API\ticketsController::class);

// Route::middleware('auth:api')->group(function(){
//     Route::resource('tickets', App\Http\Controllers\API\ticketsController::class);
// }); si j'ai pu faire le seed je decommente
