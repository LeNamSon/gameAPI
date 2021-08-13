<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Api\Catalogue;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);


        // factory(App\User::class, 30) ->create();

        // factory(App\Api\Catalogue::class,100)->create();

        factory(App\Api\Dressing::class,300)->create();

        

    }
}
