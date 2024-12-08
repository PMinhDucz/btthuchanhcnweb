<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
Route::get('posts', [Controller::class, 'index']);
Route::get('/', [PostController::class, 'index']);

