<?php

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->insert([
            'order_id' => 1,
            'item_id' => 1,
            'quantity' => 1,
            'item_name' => '唐揚げ弁当',
            'price' => 500,
            'tax' => 8,
            'image' => 'sample.jpg'
        ]);
        DB::table('order_items')->insert([
            'order_id' => 2,
            'item_id' => 1,
            'quantity' => 1,
            'item_name' => '唐揚げ弁当',
            'price' => 500,
            'tax' => 8,
            'image' => 'sample.jpg'
        ]);
        DB::table('order_items')->insert([
            'order_id' => 2,
            'item_id' => 2,
            'quantity' => 1,
            'item_name' => 'ハンバーグ弁当',
            'price' => 500,
            'tax' => 8,
            'image' => 'sample.jpg'
        ]);
        DB::table('order_items')->insert([
            'order_id' => 3,
            'item_id' => 1,
            'quantity' => 3,
            'item_name' => '唐揚げ弁当',
            'price' => 500,
            'tax' => 8,
            'image' => 'sample.jpg'
        ]);
        DB::table('order_items')->insert([
            'order_id' => 4,
            'item_id' => 3,
            'quantity' => 1,
            'item_name' => 'スペシャル弁当',
            'price' => 400,
            'tax' => 8,
            'image' => 'sample.jpg'
        ]);
        DB::table('order_items')->insert([
            'order_id' => 4,
            'item_id' => 4,
            'quantity' => 1,
            'item_name' => 'お茶',
            'price' => 100,
            'tax' => 8,
            'image' => 'sample.jpg'
        ]);
    }
}
