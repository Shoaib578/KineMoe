@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Catalog Movies</h2>
    <a href="{{ route('admin.catalogMovies.create') }}" class="btn btn-primary mb-3">Add New Catalog Movie</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Catalog</th>
                <th>Movie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catalogMovies as $catalogMovie)
                <tr>
                    <td>{{ $catalogMovie->id }}</td>
                    <td>{{ $catalogMovie->catalog->catalog_title }}</td>
                    <td>{{ $catalogMovie->movie->movie_name }}</td>
                    <td>
                        <form action="{{ route('admin.catalogMovies.destroy', $catalogMovie) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
