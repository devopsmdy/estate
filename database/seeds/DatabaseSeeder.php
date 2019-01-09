<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        // $this->call(UsersTableSeeder::class);
        $this->call(EstateTableSeeder::class);
=======
        $this->call(UsersTableSeeder::class);
        $this->call(TownshipsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(EstatesTableSeeder::class);
>>>>>>> f0c73b1264be82e0a798d78798239336e6058297
    }
}
