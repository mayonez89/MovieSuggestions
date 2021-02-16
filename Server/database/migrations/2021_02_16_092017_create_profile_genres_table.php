<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_genres', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('genre_id');
        });

        Schema::table('profile_genres', function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('genre_id')->references('id')->on('genres');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_genres');
    }
}
