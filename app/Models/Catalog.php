<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Catalog extends Model
{
    protected $fillable = [
        'catalog_title'
        
       
       

    ];
    use HasFactory;

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'catalog_movies');
    }
}
