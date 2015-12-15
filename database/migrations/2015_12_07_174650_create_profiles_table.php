<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     * Note:instead of creating a profiles and users connect table I put the code right in the profiles table
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            #Add a new INT field called 'user_id' that has to be unsigned(i.e. positive)
            $table->integer('user_id')->unsigned()->nullable();
            #The field 'user_id' is a foreign key that connects to the 'id' field in the 'authors' table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('street',50);
            $table->string('city', 40);
            $table->string('zip', 10);
            $table->string('state', 40);
            $table->string('country', 40);
            $table->string('school',60);
            $table->string('aria_one_name',100);
            $table->string('aria_one_link', 150);
            $table->string('aria_two_name',100);
            $table->string('aria_two_link', 150);
            $table->text('description');
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
        Schema::drop('profiles');
    }
}
