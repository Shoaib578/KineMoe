<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Catalog;
use App\Models\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class MovieController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests, 
    \Illuminate\Foundation\Bus\DispatchesJobs, 
    \Illuminate\Foundation\Validation\ValidatesRequests;

    public function index(){
        $comments = Comment::with('user')->latest()->get();

        $catalogs = Catalog::with('movies')->get();
        
        return view('main/home', ['catalogs'=>$catalogs, 'comments'=>$comments]);
    }

    public function myMovies()
    {

        if(auth()->user()->role != "artist"){
            return redirect()->route('home');
        }
        $user = Auth::user();
        
        $movies = $user->movies;
    
        return view('main/my_movies',["movies"=>$movies]);
    }


    public function store(Request $request)
        {
            $request->validate([
                'movie_name' => 'required|string|max:255',
                'publish_year' => 'required|integer',
                'category' => 'required|string|max:255',
                'writer' => 'required|string|max:255',
                'lead_role' => 'required|string|max:255',
                'description' => 'required',

                
                'movie_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $movie = new Movie();
            $movie->movie_name = $request->movie_name;
            $movie->publish_year = $request->publish_year;
            $movie->category = $request->category;
            $movie->added_by = auth()->user()->id;
            $movie->writer = $request->writer;
            $movie->lead_role = $request->lead_role;
            $movie->description = $request->description;


            if ($request->hasFile('movie_picture')) {
                $imagePath = $request->file('movie_picture')->store('uploads', 'public');
                $movie->movie_picture = '/storage/' . $imagePath;
            }

            $movie->save();

            return redirect()->route('movies.myMovies')->with('status', 'Movie added successfully!');
        }


        public function destroy(Movie $movie)
        {
            // Check if the logged-in user is the owner of the movie
            if (Auth::id() !== $movie->added_by) {
                return redirect()->back()->with('error', 'You do not have permission to delete this movie.');
            }
        
            // Delete the movie picture from storage
            if ($movie->movie_picture) {
                Storage::delete(str_replace('/storage/', 'public/', $movie->movie_picture));
            }
        
            // Delete the movie
            $movie->delete();
        
            return redirect()->route('movies.myMovies')->with('success', 'Movie deleted successfully.');
        }

        public function search(Request $request)
        {
            $query = $request->input('query');
            
            // Search for movies by movie_name
            $movies = Movie::where('movie_name', 'like', "%$query%")->get();
           
            return view('main/search/results', compact('movies'));
        }
}
