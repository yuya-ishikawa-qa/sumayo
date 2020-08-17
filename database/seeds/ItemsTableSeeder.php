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
        // Itemsテーブルへのseeding情報
        DB::table('items')->insert([
            [
                'item_name' => 'ナポリタン',
                'description' => '当店自慢の昔ながらなナポリタン',
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
                'path' => 'naporitan.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);      

        DB::table('items')->insert([
            [
                'item_name' => 'シーフードパスタ',
                'description' => '海鮮たっぷりパスタ',
                'is_selling' => '0',
                'item_category_id' => '1',
                'price' => '850',
                'stock_monday' => '50',
                'stock_tuesday' => '50',
                'stock_wednesday' => '50',
                'stock_thursday' => '0',
                'stock_friday' => '100',
                'stock_saturday' => '100',
                'stock_sunday' => '100',
                'path' => 'seafoodpasta.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);      

        DB::table('items')->insert([
            [
                'item_name' => 'からあげ',
                'description' => '当店自慢のジューシーなからあげ',
                'is_selling' => '0',
                'item_category_id' => '2',
                'price' => '600',
                'stock_monday' => '60',
                'stock_tuesday' => '60',
                'stock_wednesday' => '60',
                'stock_thursday' => '0',
                'stock_friday' => '100',
                'stock_saturday' => '100',
                'stock_sunday' => '100',
                'path' => 'karaage.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);     

        DB::table('items')->insert([
            [
                'item_name' => 'カルボナーラ',
                'description' => 'クリーミーなカルボナーラ',
                'is_selling' => '0',
                'item_category_id' => '1',
                'price' => '800',
                'stock_monday' => '40',
                'stock_tuesday' => '40',
                'stock_wednesday' => '40',
                'stock_thursday' => '0',
                'stock_friday' => '80',
                'stock_saturday' => '80',
                'stock_sunday' => '80',
                'path' => 'carbonara.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);    

        DB::table('items')->insert([
            [
                'item_name' => '宅飲みセット',
                'description' => 'チーズやハムの盛り合わせセット(3人前)',
                'is_selling' => '0',
                'item_category_id' => '1',
                'price' => '1100',
                'stock_monday' => '5',
                'stock_tuesday' => '5',
                'stock_wednesday' => '5',
                'stock_thursday' => '0',
                'stock_friday' => '10',
                'stock_saturday' => '10',
                'stock_sunday' => '10',
                'path' => 'party.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);      

        DB::table('items')->insert([
            [
                'item_name' => 'パン',
                'description' => 'ふっくらパン',
                'is_selling' => '0',
                'item_category_id' => '2',
                'price' => '150',
                'stock_monday' => '70',
                'stock_tuesday' => '70',
                'stock_wednesday' => '70',
                'stock_thursday' => '0',
                'stock_friday' => '120',
                'stock_saturday' => '120',
                'stock_sunday' => '120',
                'path' => 'bread.jpg',
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
                'path' => 'coffee.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);        

        DB::table('items')->insert([
            [
                'item_name' => 'カプチーノ',
                'description' => '食後にぴったりなカプチーノ',
                'is_selling' => '0',
                'item_category_id' => '4',
                'price' => '400',
                'stock_monday' => '70',
                'stock_tuesday' => '70',
                'stock_wednesday' => '70',
                'stock_thursday' => '0',
                'stock_friday' => '120',
                'stock_saturday' => '120',
                'stock_sunday' => '120',
                'path' => 'cappuccino.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);        

        DB::table('items')->insert([
            [
                'item_name' => 'ベリージュース',
                'description' => '爽やか甘酸っぱいベリージュース',
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
                'path' => 'berry.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);        

        DB::table('items')->insert([
            [
                'item_name' => 'クラフトビール',
                'description' => '爽やかプルスナービール',
                'is_selling' => '0',
                'item_category_id' => '4',
                'price' => '600',
                'stock_monday' => '70',
                'stock_tuesday' => '70',
                'stock_wednesday' => '70',
                'stock_thursday' => '0',
                'stock_friday' => '120',
                'stock_saturday' => '120',
                'stock_sunday' => '120',
                'path' => 'beer.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);        

        DB::table('items')->insert([
            [
                'item_name' => '自家製パスタ',
                'description' => '調理用パスタ',
                'is_selling' => '0',
                'item_category_id' => '3',
                'price' => '250',
                'stock_monday' => '70',
                'stock_tuesday' => '70',
                'stock_wednesday' => '70',
                'stock_thursday' => '0',
                'stock_friday' => '120',
                'stock_saturday' => '120',
                'stock_sunday' => '120',
                'path' => 'pasta.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);        

        DB::table('items')->insert([
            [
                'item_name' => '自家製ペンネ',
                'description' => 'ソースとよく絡む調理用ペンネ',
                'is_selling' => '0',
                'item_category_id' => '3',
                'price' => '3000',
                'stock_monday' => '70',
                'stock_tuesday' => '70',
                'stock_wednesday' => '70',
                'stock_thursday' => '0',
                'stock_friday' => '120',
                'stock_saturday' => '120',
                'stock_sunday' => '120',
                'path' => 'penne.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);        

        DB::table('items')->insert([
            [
                'item_name' => 'おつまみポップコーン',
                'description' => 'おつまみにぴったりな塩ポップコーン',
                'is_selling' => '0',
                'item_category_id' => '2',
                'price' => '200',
                'stock_monday' => '50',
                'stock_tuesday' => '50',
                'stock_wednesday' => '70',
                'stock_thursday' => '0',
                'stock_friday' => '50',
                'stock_saturday' => '50',
                'stock_sunday' => '50',
                'path' => 'popcorn.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);        

        DB::table('items')->insert([
            [
                'item_name' => 'チーズ',
                'description' => 'おつまみにぴったりなチーズ',
                'is_selling' => '0',
                'item_category_id' => '2',
                'price' => '500',
                'stock_monday' => '20',
                'stock_tuesday' => '20',
                'stock_wednesday' => '20',
                'stock_thursday' => '0',
                'stock_friday' => '20',
                'stock_saturday' => '20',
                'stock_sunday' => '20',
                'path' => 'cheese.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);             
    }
}
