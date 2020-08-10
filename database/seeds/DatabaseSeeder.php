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
        //$this->call(UsersTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
    }
}
