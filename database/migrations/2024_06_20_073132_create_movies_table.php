<?php
namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

return new class extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('movie_name');
            $table->year('publish_year');
            $table->string('category');
            $table->string('writer');
            $table->string('lead_role');
            $table->string('movie_picture');
            $table->text('description');  

            $table->unsignedBigInteger('added_by');

            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }

    public function catalogs()
    {
        return $this->belongsToMany(Catalog::class, 'catalog_movie');
    }
};
