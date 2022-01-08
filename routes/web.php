<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Subscriptions\PaymentController;
use App\Http\Controllers\Subscriptions\SubscriptionController;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Subscriptions'], function () {
    Route::get('/plans', [SubscriptionController::class, 'index'])->name('plans');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
});

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/create', [PostController::class, 'create'])->middleware('role:writer|admin');;
Route::post('/post/create', [PostController::class, 'store']);
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->middleware('role:editor|admin');
Route::put('/post/update/{id}', [PostController::class, 'update']);
Route::delete('/post/delete/{id}', [PostController::class, 'destroy']);
Route::get('/posts', [PostController::class, 'index']);
