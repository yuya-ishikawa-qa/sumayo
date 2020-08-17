<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'store_id' => 1,
            'order_status' => 1,
            'recieved_date' => '2020-08-15',
            'recieved_time' => '12:00:00',
            'order_total_price' => 540,
            'comment' => 'コメントテスト1'
        ]);
        DB::table('orders')->insert([
            'store_id' => 1,
            'order_status' => 2,
            'recieved_date' => '2020-08-10',
            'recieved_time' => '14:00:00',
            'order_total_price' => 1080,
            'comment' => 'コメントテスト2'
        ]);
        DB::table('orders')->insert([
            'store_id' => 1,
            'order_status' => 2,
            'recieved_date' => '2020-08-13',
            'recieved_time' => '12:00:00',
            'order_total_price' => 1620,
            'comment' => 'コメントテスト3'
        ]);
        DB::table('orders')->insert([
            'store_id' => 1,
            'order_status' => 1,
            'recieved_date' => '2020-08-15',
            'recieved_time' => '09:00:00',
            'order_total_price' => 540,
            'comment' => 'コメントテスト4'
        ]);
    }
}
