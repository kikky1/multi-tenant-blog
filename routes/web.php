<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('welcome');

Route::middleware(['admin', 'auth'])->controller(AdminController::class)->group(function(){
    Route::get('admin/dashboard', 'index')->name('admin.dashboard');
    Route::get('admin/pending', 'pending')->name('admin.pending');
    Route::post('admin/approve/{user}', 'approve')->name('admin.approve');
    Route::get('admin/view/post', 'viewPost')->name('admin.viewPost');
});

Route::get('multi/tenancy/registration', [AuthController::class, 'showRegister'])->name('register');
Route::post('multi/tenancy/registration', [AuthController::class, 'register'])->name('store.register');
Route::get('multi/tenancy/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('multi/tenancy/login', [AuthController::class, 'login'])->name('store.login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('multi/tenancy/blog/form', [CrudController::class, 'showForm'])->name('show.form');
Route::post('multi/tenancy/blog/form', [CrudController::class, 'store'])->name('store.post');
Route::get('multi/tenancy/blog/edit/{post}', [CrudController::class, 'edit'])->name('edit');
Route::put('multi/tenancy/blog/update/{post}', [CrudController::class, 'update'])->name('update');
Route::delete('multi/tenancy/blog/delete/{post}', [CrudController::class, 'destroy'])->name('destroy');

