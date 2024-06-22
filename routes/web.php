<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\SubscriptionController ;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\CatalogMovieController;
use App\Http\Controllers\Admin\UserController;

function create_admin()
{
    $admin = User::where('role','=','admin')->count();
    if($admin>0){
        Log::info('This is some useful information.');
    }else{
        User::create([
            "name"=>"admin",
            "email"=>"theadmin@gmail.com",
            "password"=>Hash::make('Admin'),
            "role"=>'admin',
            
        ]);
    }

  
}

create_admin();   // uncomment this line once you migrate the database and want to create admin user

Route::get('/',[MovieController::class, 'index'] )->name('home');
Route::post('/movies', [MovieController::class, 'store'])->middleware('auth')->name('movies.store');
Route::get('/my-movies', [MovieController::class, 'myMovies'])->middleware('auth')->name('movies.myMovies');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->middleware('auth')->name('movies.destroy');
Route::get('/search/movies', [MovieController::class, 'search'])->name('search_movies');
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');


Route::get('/signin',[SignInController::class,'index'])->name('login')->middleware('guest');
Route::post('/signin',[SignInController::class,'signin'])->name('signin')->middleware('guest');

Route::get('/signup',[SignUpController::class,'index'])->name('signup')->middleware('guest');
Route::post('/signup',[SignUpController::class,'store'])->name('signup')->middleware('guest');
Route::get('/signout',function(){
    auth()->logout();
    return redirect()->route('signin');
    })->name('signout')->middleware('auth');

    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');



Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
   
   

    Route::resource('catalogs', CatalogController::class);
    Route::resource('catalogMovies', CatalogMovieController::class);
    Route::resource('users', UserController::class)->only(['index', 'destroy', 'edit', 'update']);
    Route::get('/comments', [CommentController::class, 'adminIndex'])->name('comments.index');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

