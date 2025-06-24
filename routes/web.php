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


Route::get('/welcome', function () {
    return view('routing_task.welcome');
})->name('welcome.route');

Route::post('/submit-form', function () {
    return redirect('/success')->with('status', 'Form submitted successfully!');
})->name('form.submit');

Route::get('/success', function () {
    return session('status');
});

Route::get('/users/{id}', function ($id) {
    return "User Profile: {$id}";
})->name('user.profile');

Route::get('/login', function () {
    return view('routing_task.login');
})->name('login');

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return "Admin Dashboard";
    });

    Route::get('/reports', function () {
        return "Sales Reports";
    });
});
