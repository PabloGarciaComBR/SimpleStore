<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_status')->insert([
            'name' => 'Waiting'
        ]);

        DB::table('item_status')->insert([
            'name' => 'Preparing and packing'
        ]);

        DB::table('item_status')->insert([
            'name' => 'Ready to transport'
        ]);

        DB::table('item_status')->insert([
            'name' => 'Finished'
        ]);
    }
}
