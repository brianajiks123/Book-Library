<?php

use App\Http\Controllers\{
    BookController,
    CategoryController
};
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('books.index'));

Route::resource('categories', CategoryController::class)->names([
    'index' => 'categories.index',
    'create' => 'categories.create',
    'store' => 'categories.store',
    'show' => 'categories.show',
    'edit' => 'categories.edit',
    'update' => 'categories.update',
    'destroy' => 'categories.destroy',
]);

Route::resource('books', BookController::class)->names([
    'index' => 'books.index',
    'create' => 'books.create',
    'store' => 'books.store',
    'show' => 'books.show',
    'edit' => 'books.edit',
    'update' => 'books.update',
    'destroy' => 'books.destroy',
]);

Route::get('categories-list', fn() => App\Models\Category::all()->pluck('name', 'id'))->name('categories.list');
