<?php

namespace App\Http\Controllers;


use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBooksRequest $request)
    {
        $data = $request->validated();

        Book::create($data);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(UpdateBooksRequest $request, $book)
    {
        $data = $request->validated();

        $book = Book::findOrFail($book);

        $book->update($data);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
