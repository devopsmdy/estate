<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);
        
        $userNumber= 1;
        $i=0;
        while($i<$userNumber){
            $user= new User();
            $user->name= 'Moon';
            $user->email= 'moon@gmail.com';
            $user->password= bcrypt('ninja');
            $user->save();
            $i++;
        }
       
    }
}
