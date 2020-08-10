<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        DB::table('users')->insert([
            [
                'name' => 'スマヨ店長',
                'email' => 'admin@sumayo.com',
                'password' => Hash::make('12345678'),
                'remember_token' => str_random(10),
                'is_owner' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
