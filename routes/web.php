<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TestMailController;

Route::get('/', function () {
    return view('welcome');
});

//show all books
Route::get('/books', [BookController::class, 'index'])->name('books.index');

//create new book
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

//store new book
Route::post('/books', [BookController::class, 'store'])->name('books.store');

//show book detail
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

//edit book
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

//update book
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

//delete book
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

//send mail
Route::get('/test-email', [TestMailController::class, 'store']);