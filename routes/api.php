<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


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
Route::get('post', [PostController::class, 'index']);
Route::get('post/{id}', [PostController::class, 'getPostById']);
Route::post('post/store', [PostController::class, 'store']);
Route::put('post/edit/{id}', [PostController::class, 'edit']);
Route::delete('post/delete/{id}', [PostController::class, 'delete']);
Route::get('comment/all', [CommentController::class, 'index']);
Route::post('comment/store', [CommentController::class, 'store']);
Route::put('comment/edit/{id}', [CommentController::class, 'edit']);
Route::delete('comment/delete/{id}', [CommentController::class, 'delete']);
Route::get('comment/{postId}', [CommentController::class, 'getCommentsByPostId']);
