<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\CatalogMovie;
use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogMovieController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests, 
    \Illuminate\Foundation\Bus\DispatchesJobs, 
    \Illuminate\Foundation\Validation\ValidatesRequests;
    public function index()
    {
        if(auth()->user()->role !== "admin"){  
            
            return redirect()->route('home');
        }
        $catalogMovies = CatalogMovie::with(['catalog', 'movie'])->get();
        return view('admin.catalogMovies.index', compact('catalogMovies'));
    }

    public function create()
    {
        if(auth()->user()->role !== "admin"){  
            
            return redirect()->route('home');
        }
        $catalogs = Catalog::all();
        $movies = Movie::all();
        return view('admin.catalogMovies.create', compact('catalogs', 'movies'));
    }

    public function store(Request $request)
    {
        if(auth()->user()->role !== "admin"){  
            
            return redirect()->route('home');
        }
        $request->validate([
            'catalog_id' => 'required|exists:catalogs,id',
            'movie_id' => 'required|exists:movies,id',
        ]);

        print($request->catalog_id);
        CatalogMovie::create($request->all());
        return redirect()->route('admin.catalogMovies.index')->with('success', 'CatalogMovie created successfully.');
    }

    public function destroy(CatalogMovie $catalogMovie)
    {
        if(auth()->user()->role !== "admin"){  
            
            return redirect()->route('home');
        }
        $catalogMovie->delete();
        return redirect()->route('admin.catalogMovies.index')->with('success', 'CatalogMovie deleted successfully.');
    }
}
