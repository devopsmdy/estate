<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Estate::class, 50)->create();
        DB::table('estates')
            ->whereRaw('mod(id,2) <> 0')
            ->update(['deal' => 'rent']);

    }
}
