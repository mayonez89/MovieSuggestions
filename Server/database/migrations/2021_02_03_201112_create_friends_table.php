<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id();

            $table->enum('status', \App\Friend::STATES)->default(\App\Friend::NEW_STATE);

            $table->unsignedBigInteger('requester');
            $table->unsignedBigInteger('requested');
        });

        Schema::table('friends', function (Blueprint $table) {
            $table->foreign('requester')->references('id')->on('users');
            $table->foreign('requested')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
