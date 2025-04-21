<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('post', PostController::class);
Route::resource('video', VideoController::class);

Route::get('post/{post}/comment', [CommentController::class, 'createPostComment'])->name('post.comment.create');
Route::post('post/{post}/comment', [CommentController::class, 'storePostComment'])->name('post.comment.store');
Route::get('video/{video}/comment', [CommentController::class, 'createVideoComment'])->name('video.comment.create');
Route::post('video/{video}/comment', [CommentController::class, 'storeVideoComment'])->name('video.comment.store');
Route::delete('comment/{id}', [CommentController::class, 'deleteComment'])->name('comment.destroy');