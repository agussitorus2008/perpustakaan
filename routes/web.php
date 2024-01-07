<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\app\user\BookController as userBookController;
use App\Http\Controllers\app\admin\BookController as adminBookController;


use App\Http\Controllers\app\user\CategoryController as userCategoryController;
use App\Http\Controllers\app\admin\CategoryController as adminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Grup autentikasi
Route::middleware(['web'])->prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['web', 'user'])->prefix('user')->group(function () {
    Route::get('/books', [userBookController::class, 'index'])->name('user.books.index');
    Route::get('/books/filter', [userBookController::class, 'filterByCategory'])->name('user.filterByCategory');
    Route::get('/books/create', [userBookController::class, 'create'])->name('user.books.create');
    Route::post('/books/store', [userBookController::class, 'store'])->name('user.storeBook');
    Route::get('/books/edit/{id}', [userBookController::class, 'edit'])->name('user.books.edit');
    Route::put('/books/update/{id}', [userBookController::class, 'update'])->name('user.books.update');
    Route::get('/books/delete/{id}', [userBookController::class, 'delete'])->name('user.books.delete');
    Route::delete('/books/delete/{id}', [userBookController::class, 'destroy'])->name('user.books.delete');
    Route::get('/export/excel', [userBookController::class, 'exportExcel'])->name('user.books.export.excel');
    Route::get('/export/pdf', [userBookController::class, 'exportPDF'])->name('user.books.export.pdf');





    Route::get('/categories', [userCategoryController::class, 'index'])->name('user.categories.index');
    Route::get('/categories/create', [userCategoryController::class, 'create'])->name('user.categories.create');
    Route::post('/categories/store', [userCategoryController::class, 'store'])->name('user.categories.store');
    Route::get('/categories/edit/{id}', [userCategoryController::class, 'edit'])->name('user.categories.edit');
    Route::put('/categories/update/{id}', [userCategoryController::class, 'update'])->name('user.categories.update');
    Route::get('/categories/delete/{id}', [userCategoryController::class, 'delete'])->name('user.categories.delete');
    Route::delete('/categories/delete/{id}', [userCategoryController::class, 'destroy'])->name('user.categories.delete');
});

Route::middleware(['web', 'admin'])->prefix('admin')->group(function () {
    Route::get('/books', [adminBookController::class, 'index'])->name('admin.books.index');
    Route::get('/books/filter', [adminBookController::class, 'filterByCategory'])->name('filterByCategory');
    Route::get('/books/create', [adminBookController::class, 'create'])->name('books.create');
    Route::post('/books/store', [adminBookController::class, 'store'])->name('storeBook');
    Route::get('/books/edit/{id}', [adminBookController::class, 'edit'])->name('books.edit');
    Route::put('/books/update/{id}', [adminBookController::class, 'update'])->name('books.update');
    Route::get('/books/delete/{id}', [adminBookController::class, 'delete'])->name('books.delete');
    Route::delete('/books/delete/{id}', [adminBookController::class, 'destroy'])->name('books.delete');
    Route::get('/books/export', [adminBookController::class, 'export'])->name('books.export');
    Route::get('/export/excel', [userBookController::class, 'exportExcel'])->name('admin.books.export.excel');



    Route::get('/categories', [adminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [adminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [adminCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [adminCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update/{id}', [adminCategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/delete/{id}', [adminCategoryController::class, 'delete'])->name('categories.delete');
    Route::delete('/categories/delete/{id}', [adminCategoryController::class, 'destroy'])->name('categories.delete');
});
