<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class SignInController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests, 
    \Illuminate\Foundation\Bus\DispatchesJobs, 
    \Illuminate\Foundation\Validation\ValidatesRequests;
    public function index()
    {
      
       return view('Auth.signin');
    }



    public function signin(Request $request){
        
        $this->validate($request,[
            'email'=>'required|max:255',
           
           
            'password'=>'required|max:255',
           

        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }


        

        if(auth()->user()->role == 'artist' || auth()->user()->role == 'viewer'){
            return redirect()->route('home');

        }else if(auth()->user()->role == 'admin'){
            return redirect()->route('admin.catalogs.index');

        }
    }

}
