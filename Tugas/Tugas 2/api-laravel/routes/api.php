<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/packages', App\Http\Controllers\Api\PackageController::class);
Route::apiResource('/members', App\Http\Controllers\Api\MemberController::class);
