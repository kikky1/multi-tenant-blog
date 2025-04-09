<?php

use App\Http\Controllers\API\AdminPostController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',  [AuthController::class, 'register']);
Route::post('/login',  [AuthController::class, 'login']);
Route::post('/index',  [AuthController::class, 'index']);
Route::get('/show/{user}',  [AuthController::class, 'show']);

Route::middleware('auth:sanctum')->controller(AuthController::class)->group(function (){
    Route::post('/logout',  'logout');
});

Route::middleware('auth:sanctum')->controller(AdminPostController::class)->group(function (){
    Route::get('/admin/index',  'index');
});

Route::middleware('auth:sanctum')->controller(PostController::class)->group(function (){
    Route::get('/posts/index',  'index');
    Route::post('/posts/store',  'store');
    Route::get('/posts/show/{post}',  'show');
    Route::put('/posts/update/{post}',  'update');
    Route::delete('/posts/destroy/{post}',  'destroy');

});
