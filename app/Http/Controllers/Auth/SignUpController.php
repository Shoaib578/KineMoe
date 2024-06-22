<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SignUpController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests, 
    \Illuminate\Foundation\Bus\DispatchesJobs, 
    \Illuminate\Foundation\Validation\ValidatesRequests;
    public function index()
    {
       
       return view('Auth.signup');
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'role'=>'required|max:50',
           
            'email'=>'required|email|max:255',
            'password'=>'required|max:255',
            
           

        ]);

        $user = user::where('email','=',$request->email)->count();
        if($user>0){
        

        return redirect()->back()->with('status','User Already Exist');

        }
        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            
            "password"=>Hash::make($request->password),
            
            "role"=>$request->role

        ]);

        
        return redirect()->route('signin')->with('status','User Registered Successfully');

    }

}
