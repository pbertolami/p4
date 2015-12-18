<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        //Note the ProfilesTableSeeder::class is commented out because the faker URL causes a problem with the text field
        //required because of the youtube clips. For this project I am just seeding the required users Jill and Jahmal
        //so the teacher can test the product
        //Also seeding the ProfilePhotoTable is beyond the scope of this class and currently do not know how to seed
        // a path to a file that is not there yet. ie the photos are not in the file so there
        //cannot be a fake or seeded path unless it was to a fake photo file that was not used in production.
        //$this->call(ProfilesTableSeeder::class);
        Model::reguard();
    }
}
