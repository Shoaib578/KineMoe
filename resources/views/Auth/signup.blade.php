@extends('layouts.main_layout')

@section('content')

<div style="display:flex;justify-content:center;">

<div class="w-8/12 bg-white p6 rounded-lg" style="width:50%;margin-top:20px;padding:10px;">





    <center>
<h1 style="color:darkblue">Register</h1>
</center>



<form method="post" style="margin-top:30px">

                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Full name"  class="bg-gray-100 border-2 w-full  rounded-lg @error('name') border-red-500 @enderror form-control" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

               

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="role" class="sr-only">Role</label>
                    <select name="role" class="bg-gray-100 border-2 w-full  rounded-lg @error('role') border-red-500 @enderror form-control" >
                        <option>Select role</option>
                        <option value="viewer">Viewer</option>
                        <option value="artist">Artist</option>

                    </select>
                    @error('role')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

               

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full  rounded-lg @error('password') border-red-500 @enderror form-control" value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

             

                <center>
                <div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

                </center>
            </form>

            <center style="margin-top:20px;">
            <a href="{{route('signin')}}" >Already have an Account Want to Login</a>
            </center>
</div>
</div>
@endsection