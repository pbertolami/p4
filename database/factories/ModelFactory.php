<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(P4\User::class, function (Faker\Generator $faker) {
    return [
        'created_at'     => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at'     => Carbon\Carbon::now()->toDateTimeString(),
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(P4\Profile::class, function (Faker\Generator $faker) {
    return [

        'created_at'     => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at'     => Carbon\Carbon::now()->toDateTimeString(),
        //'user_id'        => factory('P4\User')->create()->id,
        'first_name'     =>$faker->firstName,
        'last_name'      =>$faker->lastName,
        'street'         =>$faker->streetName,
        'city'           =>$faker->city,
        'zip'            =>$faker->postcode,
        'state'          =>$faker->state,
        'country'        =>$faker->country,
        'school'         =>$faker->word,
        'aria_one_name'  =>$faker->text,
        'aria_one_link'  =>$faker->text,
        'aria_two_name'  =>$faker->text,
        'aria_two_link'  =>$faker->text,
        'description'    =>$faker->text,

    ];
});
$factory->define(P4\Photo::class, function (Faker\Generator $faker){
    return [
        'created_at'        => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at'        => Carbon\Carbon::now()->toDateTimeString(),
        'profile_id'        =>factory('P4\Profile')->create()->id,
        'photo'             =>$faker->imageUrl($width = 640, $height = 480),
    ];
});