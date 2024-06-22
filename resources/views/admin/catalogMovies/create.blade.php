@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Create Catalog Movie</h2>
    <form action="{{ route('admin.catalogMovies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="catalog_id">Catalog</label>
            <select class="form-control" id="catalog_id" name="catalog_id" required>
                <option>Select Catalog</option>
                @foreach($catalogs as $catalog)
                    <option value="{{ $catalog->id }}">{{ $catalog->catalog_title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="movie_id">Movie</label>
            <select class="form-control" id="movie_id" name="movie_id" required>
                <option>Select Movie</option>

                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->movie_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
