<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            [
                'name' => 'スマヨレストラン',
                'phone' => '03-1234-1234',
                'postcode' => '150-0001',
                'address' => '東京都渋谷区神宮前1-1-1',
                'comment' => '表参道駅A2出口から徒歩5分です。出口大通りから路地に入っていただいてスグです！',
                'start_time' => '10:00',
                'end_time' => '20:00',
                'earliest_receivable_time' => 60,
                'serve_range_time' => 15,
                'capacity' => 5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);        
    }
}
