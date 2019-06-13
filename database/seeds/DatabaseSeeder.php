<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CarrierPricesTableSeeder::class);
        $this->call(CarriersTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(PaymentTypeTableSeeder::class);
        $this->call(PostalcodesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(StatesTableSeeder::class);
    }
}
