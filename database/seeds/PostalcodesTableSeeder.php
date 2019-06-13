<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostalcodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        DB::table('postalcodes')->insert([
            'city_id' => 1,
            'code' => '82530230',
            'place' => 'Av. Victor Ferreira do Amaral',
            'neighborhood' => 'Tarumã',
            'created_at' => $now
        ]);
    }
}
