<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileManagementController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/index', [PostController::class, 'index'])->name('post.index');
Route::get('/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/update/{post}', [PostController::class, 'update'])->name('post.update');


Route::get('user', [UserController::class, 'userList'])
    ->name('user.list');

Route::get('/verify-email/{user}', [AuthController::class, 'verifyEmail'])
    ->name('verification.verify')
    ->middleware('guest');

Route::get('/reset-password/{user}', [AuthController::class, 'resetPassword'])
    ->name('password.reset')
    ->middleware('guest');


Route::get('file-management', [FileManagementController::class, 'index'])
    ->name('file.index');

Route::post('file-store', [FileManagementController::class, 'fileStore'])
    ->name('file.store')
    ->middleware('virus.scan');

Route::get('/invoices/download/{id}', [FileManagementController::class, 'downloadInvoice'])
    ->name('invoice.download');

