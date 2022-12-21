<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 20; $i++){
            
            DB::table('users')->insert([
        	'username' => 'user_'.$faker->name,
            'email' => Str::random(10).'@gmail.com',
            'role_id' => 2,
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
   
  }

        // for make 10 users 
        // DB::table('users')->insert([
        // 	'username' => 'admin',
        //     'first_name' => '',
        //     'last_name' => '',
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
    }
}
