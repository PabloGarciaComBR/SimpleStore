<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        DB::table('products')->insert([
            'name' => 'Business Card',
            'description' => 'Couchê 250g 4x0',
            'quantity' => 1000,
            'price' => 22.9,
            'created_at' => $now
        ]);

        DB::table('products')->insert([
            'name' => 'Business Card',
            'description' => 'Couchê 250g 4x0',
            'quantity' => 5000,
            'price' => 109.9,
            'created_at' => $now
        ]);

        DB::table('products')->insert([
            'name' => 'Business Card',
            'description' => 'Couchê 250g 4x4',
            'quantity' => 1000,
            'price' => 35.9,
            'created_at' => $now
        ]);

        DB::table('products')->insert([
            'name' => 'Business Card',
            'description' => 'Couchê 250g 4x0',
            'quantity' => 5000,
            'price' => 174.9,
            'created_at' => $now
        ]);

        DB::table('products')->insert([
            'name' => 'Flyer',
            'description' => 'Couchê 90g 4x4 10x15cm',
            'quantity' => 1000,
            'price' => 49.9,
            'created_at' => $now
        ]);
    }
}
