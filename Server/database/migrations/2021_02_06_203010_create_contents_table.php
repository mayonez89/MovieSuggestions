<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->string('slug')->index();
            $table->string('title');
            $table->string('trailer_url')->nullable();
            $table->string('description')->nullable();
            $table->string('director')->nullable();
            $table->string('release_date')->nullable();

//            if we allow users to create content
//            $table->unsignedInteger('owner_id'); // user_id
//            $table->foreign('owner_id')->references('id')->on('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
