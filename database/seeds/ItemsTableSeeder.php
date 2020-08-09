<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'item_name' => 'ナポリタン',
                'description' => '昔ながらのナポリタン',
                'is_selling' => '0',
                'item_category_id' => '1',
                'price' => '800',
                'stock_monday' => '50',
                'stock_tuesday' => '50',
                'stock_wednesday' => '50',
                'stock_thursday' => '0',
                'stock_friday' => '100',
                'stock_saturday' => '100',
                'stock_sunday' => '100',
                'path' => 'items/naporitan.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);      

        DB::table('items')->insert([
            [
                'item_name' => 'からあげ',
                'description' => 'ジューシーなからあげ',
                'is_selling' => '0',
                'item_category_id' => '1',
                'price' => '600',
                'stock_monday' => '60',
                'stock_tuesday' => '60',
                'stock_wednesday' => '60',
                'stock_thursday' => '0',
                'stock_friday' => '100',
                'stock_saturday' => '100',
                'stock_sunday' => '100',
                'path' => 'items/karaage.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);     

        DB::table('items')->insert([
            [
                'item_name' => 'カルボナーラ',
                'description' => 'クリーミーなカルボナーラ',
                'is_selling' => '0',
                'item_category_id' => '2',
                'price' => '800',
                'stock_monday' => '40',
                'stock_tuesday' => '40',
                'stock_wednesday' => '40',
                'stock_thursday' => '0',
                'stock_friday' => '80',
                'stock_saturday' => '80',
                'stock_sunday' => '80',
                'path' => 'items/carbonara.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);    

        DB::table('items')->insert([
            [
                'item_name' => 'パン',
                'description' => 'ふっくらパン',
                'is_selling' => '0',
                'item_category_id' => '3',
                'price' => '150',
                'stock_monday' => '70',
                'stock_tuesday' => '70',
                'stock_wednesday' => '70',
                'stock_thursday' => '0',
                'stock_friday' => '120',
                'stock_saturday' => '120',
                'stock_sunday' => '120',
                'path' => 'items/bread.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);      

        DB::table('items')->insert([
            [
                'item_name' => 'コーヒー',
                'description' => '食後にぴったりなコーヒー',
                'is_selling' => '0',
                'item_category_id' => '4',
                'price' => '150',
                'stock_monday' => '70',
                'stock_tuesday' => '70',
                'stock_wednesday' => '70',
                'stock_thursday' => '0',
                'stock_friday' => '120',
                'stock_saturday' => '120',
                'stock_sunday' => '120',
                'path' => 'items/coffee.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);        
    }
}
