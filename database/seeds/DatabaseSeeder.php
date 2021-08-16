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


        factory(App\User::class, 1000) ->create();

        factory(App\Api\Catalogue::class,5000)->create();

        factory(App\Api\Dressing::class,5000)->create();

        

    }
}
