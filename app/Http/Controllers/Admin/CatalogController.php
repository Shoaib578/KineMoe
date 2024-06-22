<?php

namespace App\Http\Controllers\Admin;
use App\Models\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests, 
    \Illuminate\Foundation\Bus\DispatchesJobs, 
    \Illuminate\Foundation\Validation\ValidatesRequests;


    
    

    public function index()
    {
        if(auth()->user()->role !== "admin"){  
            
            return redirect()->route('home');
        }
        $catalogs = Catalog::all();
        return view('admin.catalogs.index', compact('catalogs'));
    }

    public function create()
    {
        if(auth()->user()->role !== "admin"){  
            
            return redirect()->route('home');
        }
        return view('admin.catalogs.create');
    }

    public function store(Request $request)
    {
        if(auth()->user()->role !== "admin"){  
            
            return redirect()->route('home');
        }
        $request->validate([
            'catalog_title' => 'required|string|max:255',
        ]);

        Catalog::create($request->all());
        return redirect()->route('admin.catalogs.index')->with('success', 'Catalog created successfully.');
    }

    public function destroy(Catalog $catalog)
    {
        if(auth()->user()->role !== "admin"){  
            
            return redirect()->route('home');
        }
        $catalog->delete();
        return redirect()->route('admin.catalogs.index')->with('success', 'Catalog deleted successfully.');
    }
}
