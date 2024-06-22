<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalog;
use App\Models\Movie;

class CatalogMovie extends Model
{
    protected $fillable = [
        'catalog_id',
       
        'movie_id'
      
       

    ];
    use HasFactory;
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
