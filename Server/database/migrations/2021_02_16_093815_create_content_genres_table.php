<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_genres', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('content_id');
            $table->unsignedBigInteger('genre_id');
        });

        Schema::table('content_genres', function (Blueprint $table) {
            $table->foreign('content_id')->references('id')->on('contents');
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
        Schema::dropIfExists('content_genres');
    }
}
