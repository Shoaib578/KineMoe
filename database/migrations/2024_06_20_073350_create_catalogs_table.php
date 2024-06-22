<?php
namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('catalog_title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catalogs');
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'catalog_movies');
    }
};
