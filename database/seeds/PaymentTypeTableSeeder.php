<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        DB::table('payment_type')->insert([
            'name' => 'Credit Card',
            'created_at' => $now
        ]);

        DB::table('payment_type')->insert([
            'name' => 'Invoice',
            'created_at' => $now
        ]);

        DB::table('payment_type')->insert([
            'name' => 'Prepaid',
            'created_at' => $now
        ]);

        DB::table('payment_type')->insert([
            'name' => 'Bank Transfer',
            'created_at' => $now
        ]);

        DB::table('payment_type')->insert([
            'name' => 'Direct Deposit',
            'created_at' => $now
        ]);
        
        DB::table('payment_type')->insert([
            'name' => 'Cash',
            'created_at' => $now
        ]);
    }
}
