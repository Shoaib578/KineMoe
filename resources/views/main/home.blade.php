@extends('layouts.main_layout')

@section('content')

<div style="display:flex;justify-content:center;">

<div class="w-8/12 bg-white p6 rounded-lg" style="width:50%;margin-top:20px;padding:10px;">

@if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center" style="background-color:red;color:white;">
                    {{ session('status') }}
                </div>
@endif
<style>
        body {
            background-color: #121212; /* Dark background for the entire page */
            color: #fff; /* White text for better contrast */
        }
        .card {
            border: 1px solid #17aa35; /* Green border for the card */
        }
        .card-img-top {
            height: 250px; /* Fixed height for images */
            object-fit: cover; /* Ensure image covers the area */
        }
        .card-title {
            font-size: 1.25rem; /* Larger title */
        }
        .card-text {
            font-size: 1rem; /* Standard text size */
        }
        .btn-primary {
            background-color: #17aa35; /* Custom button color */
            border: none;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #148c2b; /* Darker shade on hover */
        }
    </style>

<div class="container mt-5">
    <form action="{{ route('search_movies') }}" method="GET">
        <input type="text" name="query" class="form-control bg-dark text-white" placeholder="Search movie">
        <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>
    <br>
    @foreach($catalogs as $catalog)
    <h2 style="color:black;">{{ $catalog->catalog_title }}</h2>
    <div class="row">
        @foreach($catalog->movies as $movie)
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card text-white bg-dark h-100">
                <img src="{{ $movie->movie_picture }}" class="card-img-top img-fluid" alt="{{ $movie->movie_name }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $movie->movie_name }}</h5>
                    <p class="card-text mb-4">
                        <strong>Publish Year:</strong> {{ $movie->publish_year }}<br>
                        <strong>Category:</strong> {{ $movie->category }}
                    </p>
                    <div class="mt-auto">
                        <button type="button" class="btn btn-primary watch-btn" data-toggle="modal" data-target="#movieModal"
                            data-name="{{ $movie->movie_name }}"
                            data-description="{{ $movie->description }}"

                            data-picture="{{ $movie->movie_picture }}"
                            data-year="{{ $movie->publish_year }}"
                            data-category="{{ $movie->category }}">
                            Watch
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach



</div>

<br >


<div class="container mt-5 bg-dark">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h2>Comments</h2>

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Add Comment:</label>
            <textarea name="comment" id="comment" rows="3" class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
            @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <hr>

    <h3>All Comments</h3>
    @foreach($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" style="color:black;">{{ $comment->user->name }}</h5>
                <p class="card-text" style="color:black;">{{ $comment->comment }}</p>
                <p class="card-text"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
            </div>
        </div>
    @endforeach
    <br >

</div>

<!-- Movie Modal -->
<div class="modal fade" id="movieModal" tabindex="-1" role="dialog" aria-labelledby="movieModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="movieModalLabel">Movie Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="movie-picture" class="card-img-top img-fluid mb-3" src="" alt="">
                <h5 id="movie-name"></h5>
                <p><strong>Publish Year:</strong> <span id="movie-year"></span></p>
                <p><strong>Category:</strong> <span id="movie-category"></span></p>
                <strong>Description:</strong>
                <p id="description"></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Watch Now</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.watch-btn', function () {
        var name = $(this).data('name');
        var picture = $(this).data('picture');
        var year = $(this).data('year');
        var category = $(this).data('category');
        var description = $(this).data('description');
        $('#movie-name').text(name);
        $('#movie-picture').attr('src', picture);
        $('#movie-year').text(year);
        $('#movie-category').text(category);
        $('#description').text(description);

      

    });
</script>


@endsection
