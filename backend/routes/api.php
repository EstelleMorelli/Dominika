<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function (){
    return 'Bienvenue sur le Back Office !';
});

Route::get('/articles', [ArticleController::class, 'list']);

Route::get('/articles/{id}', [ArticleController::class, 'find'])->where('id', '[0-9]+');

Route::get('/articles/{slug}', [ArticleController::class, 'findBySlug'])->where('slug', '[a-zA-Z0-9-_\.]+');

Route::post('/articles', [ArticleController::class, 'create']);

Route::put('/articles/{id}', [ArticleController::class, 'update'])->where('id', '[0-9]+');

Route::patch('/articles/{id}', [ArticleController::class, 'update'])->where('id', '[0-9]+');

Route::delete('/articles/{id}', [ArticleController::class, 'delete'])->where('id', '[0-9]+');

Route::get('/prices', [PriceController::class, 'list']);

Route::get('/prices/{id}', [PriceController::class, 'find'])->where('id', '[0-9]+');

Route::post('/prices', [PriceController::class, 'create']);

Route::put('/prices/{id}', [PriceController::class, 'update'])->where('id', '[0-9]+');

Route::patch('/prices/{id}', [PriceController::class, 'update'])->where('id', '[0-9]+');

Route::delete('/prices/{id}', [PriceController::class, 'delete'])->where('id', '[0-9]+');

Route::get('/admins', [AdminController::class, 'list']);

Route::post('/admins/{email}', [AdminController::class, 'findByEmail'])->where('email', '[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}');