<?php

namespace App\Http\Controllers;


use App\Models\Book;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'author' => 'nullable|string'
        ]);

        Book::create([
            'name' => $data['name'],
            'author' => $data['author']
        ]);

        return redirect()->route('books.index');
    }

    public function show($book)
    {
        $book = Book::findOrFail($book);

        return view('books.show', compact('book'));
    }

    public function edit($book)
    {
        $book = Book::findOrFail($book);

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $book)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'author' => 'nullable|string'
        ]);

        $book = Book::findOrFail($book);

        $book->name = $data['name'];
        $book->author = $data['author'];
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy($book)
    {
        $book = Book::findOrFail($book);

        $book->delete();

        return redirect()->route('books.index');
    }
}
