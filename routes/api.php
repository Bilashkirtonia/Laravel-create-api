<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('student',[ApiController::class,"index"]);
Route::post('student',[ApiController::class,"store"]);
Route::get('student/{id}',[ApiController::class,"show"]);
Route::put('student/{id}',[ApiController::class,"update"]);
Route::delete('student/{id}',[ApiController::class,"delete"]);
