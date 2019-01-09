<?php

use Illuminate\Database\Seeder;
use App\Township;

class TownshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Township::class, 10)->create();
    }
}
