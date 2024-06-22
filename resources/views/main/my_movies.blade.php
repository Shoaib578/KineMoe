@extends('layouts.main_layout')

@section('content')
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
    <h2 class="mb-4">My Movies</h2>
   

    <div class="row bg-white p-3" style="border-radius:5px;">
        @forelse($movies as $movie)
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-dark h-100">
                   
                    <img src="{{ asset($movie->movie_picture) }}" class="card-img-top img-fluid" alt="{{ $movie->movie_name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $movie->movie_name }}</h5>
                        <p class="card-text mb-4">
                            <strong>Publish Year:</strong> {{ $movie->publish_year }}<br>
                            <strong>Category:</strong> {{ $movie->category }}
                        </p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-primary">Watch</a>
                            <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="width:100%;">Delete</button>
                            </form>
                        </div>

                       
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>No movies found. Start adding some!</p>
            </div>
        @endforelse
    </div>
</div>


@endsection
