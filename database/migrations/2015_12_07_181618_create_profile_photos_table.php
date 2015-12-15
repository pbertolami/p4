<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilePhotosTable extends Migration
{
    /**
     * Run the migrations.
     * Note: if an id or record from the profile table is deleted the associated photo will be deleted as well
     * @return void
     */
    public function up()
    {
        Schema::create('profile_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->string('photo_name');
            $table->string('photo_path');
            $table->string('thumbnail_path');
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
        Schema::drop('profile_photos');
    }
}
