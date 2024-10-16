<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['namespace'=>'App\Http\Controllers'], function() {
    Route::apiResource('posts', PostController::class);
});

Route::group(['namespace'=>'App\Http\Controllers'], function() {
    Route::apiResource('comments', CommentController::class);
});