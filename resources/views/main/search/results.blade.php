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
    <br >
    
        @foreach($movies as $movie)

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
                        <a href="#" class="btn btn-primary" >Watch</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
    

</div>



@endsection
