<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        DB::table('carriers')->insert([
            'name' => 'Omnilog',
            'created_at' => $now
        ]);
    }
}
