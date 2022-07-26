@extends('layout.app')

@section('content')
    <h1>Book Detail</h1>
            
    <p>Name: {{ $book->name }}</p>
    <p>Author: {{ $book->author }}</p>

    <a href="{{ route('books.index') }}">Back</a>
@endsection