<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'order_id' => 1,
            'last_name' => '佐藤',
            'first_name' => '太郎',
            'last_name_kana' => 'サトウ',
            'first_name_kana' => 'タロウ',
            'mail' => 'sample1@sample.com',
            'tel' => '090-0000-0001'
        ]);
        DB::table('customers')->insert([
            'order_id' => 2,
            'last_name' => '佐藤',
            'first_name' => '次郎',
            'last_name_kana' => 'サトウ',
            'first_name_kana' => 'ジロウ',
            'mail' => 'sample2@sample.com',
            'tel' => '090-0000-0002'
        ]);
        DB::table('customers')->insert([
            'order_id' => 3,
            'last_name' => '加藤',
            'first_name' => '次郎',
            'last_name_kana' => 'カトウ',
            'first_name_kana' => 'ジロウ',
            'mail' => 'sample3@sample.com',
            'tel' => '090-0000-0003'
        ]);
        DB::table('customers')->insert([
            'order_id' => 4,
            'last_name' => '佐藤',
            'first_name' => '花子',
            'last_name_kana' => 'サトウ',
            'first_name_kana' => 'ハナコ',
            'mail' => 'sample4@sample.com',
            'tel' => '090-0000-0004'
        ]);
    }
}
