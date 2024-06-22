<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Catalog;

class Movie extends Model
{
    protected $fillable = [
        'movie_name',
        'publish_year',
        'category',
        'writer',
        'lead_role',
        'movie_picture',
        'added_by',
        'description'


    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }   

    public function catalogs()
    {
        return $this->belongsToMany(Catalog::class, 'catalog_movies');
    }
}
