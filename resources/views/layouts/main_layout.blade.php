<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




 

    <title>KineMoe</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  

</head>
<body >

<header>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm" >
        <div class="container">
          <a class="navbar-brand"  href="/"><span style="color:#17aa35">KineMoe</span> </a>

      

          <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item ">
                <a class="nav-link"   href="{{ route('home') }}">Home</a>
              </li>
            
              

          @if (auth()->user())
          @if(auth()->user()->role == 'artist')

            <li class="nav-item ">
                <a class="nav-link"  href="{{ route('movies.myMovies') }}">My Movies</a>
              </li>
            @endif


            @if(auth()->user()->role == 'artist')

            <li class="nav-item ">
                <a class="nav-link"  data-toggle="modal" data-target="#createMovieModal"  style="cursor:pointer;">Add Movie</a>
              </li>
            @endif

        



          <li class="nav-item">
                  <a class="btn btn-success ml-lg-3"  href="{{ route('signout') }}">Logout</a>
                </li>
           @else
              
              <li class="nav-item">
              <a class=" btn btn-success ml-lg-3" style="text-decoration:none;color:white" href="{{ route('signin') }}">Login </a>
              &nbsp;
                <a class="btn btn-success ml-lg-3" href="{{ route('signup') }}">Register</a>
              </li>
        @endif
            </ul>
          </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
      </nav>
   
  </header>
  
</header>




@if (session('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <center>
        {{ session('status') }}
        </center>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    
 @endif



    @yield('content')




    <!-- Create Movie Modal -->
<div class="modal fade" id="createMovieModal" tabindex="-1" aria-labelledby="createMovieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content  bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="createMovieModalLabel">Add New Movie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST"  action="{{ route('movies.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="movie_name">Movie Name</label>
                        <input type="text" class="form-control" id="movie_name" name="movie_name" required>
                    </div>
                    <div class="form-group">
                        <label for="publish_year">Publish Year</label>
                        <input type="number" class="form-control" id="publish_year" name="publish_year" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <div class="form-group">
                        <label for="writer">Writer</label>
                        <input type="text" class="form-control" id="writer" name="writer" required>
                    </div>
                    <div class="form-group">
                        <label for="lead_role">Lead Role</label>
                        <input type="text" class="form-control" id="lead_role" name="lead_role" required>
                    </div>
                    <div class="form-group border p-2" style="border-radius:5px;">
                        <label for="movie_picture">Movie Picture</label>
                        <input type="file" class="form-control-file" id="movie_picture" name="movie_picture" required>
                    </div>

                    <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>



                    <button type="submit" class="btn btn-success" style="width:100%;">Add Movie</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>