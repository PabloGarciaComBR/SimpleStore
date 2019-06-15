<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSizePlaceTablePostalcodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postalcodes', function (Blueprint $table) {
            $table->string('place', 80)->change();
            $table->string('neighborhood', 25)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postalcodes', function (Blueprint $table) {
            $table->string('place', 10)->change();
            $table->string('neighborhood', 10)->change();
        });
    }
}
