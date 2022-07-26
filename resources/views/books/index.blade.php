@extends('layout.app')

@section('content')
    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Add Book</a>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}">
                            {{ $book->name }}
                        </a>
                    </td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}">Edit</a> | 
                        <form action="{{ route('books.destroy', $book->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this record?')" class="btn btn-link p-0">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection