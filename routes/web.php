<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/user')->group(function(){
    Route::get('/editProfile', [UserController::class, 'editProfile'])->name('user.edit-profile');
    Route::get('/profile/{user_id}', [UserController::class, 'usersProfile'])->name('user.profile');
    Route::post('/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/update/password', [UserController::class, 'updatePassword'])->name('user.update.password');
    Route::get('/image/{filename}', [UserController::class, 'getImageFromStorage'])->name('user.image');
});

Route::prefix('/images')->group(function(){
    Route::get('/create', [ImageController::class, 'create'])->name('image.create');
    Route::post('/store', [ImageController::class, 'store'])->name('image.store');
    Route::get('/favorites', [ImageController::class, 'favorites'])->name('image.favorites');
    Route::get('/detail/{id}', [ImageController::class, 'details'])->name('image.details');
    Route::get('/{filename}', [ImageController::class, 'show'])->name('image.show');
    Route::get('/delete/{id}', [ImageController::class, 'delete'])->name('image.delete');
});

Route::prefix('/comments')->group(function(){
    Route::post('/store', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');
});

Route::prefix('/likes')->group(function(){
    Route::get('/like/{image_id}', [LikeController::class, 'like'])->name('like.like');
    Route::get('/unlike/{image_id}', [LikeController::class, 'unlike'])->name('like.unlike');
});
